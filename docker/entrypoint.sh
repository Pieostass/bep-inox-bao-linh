#!/bin/sh
set -e

APP_DIR=/var/www/html
cd "$APP_DIR"

# Port configuration for Render ($PORT is provided by Render, defaults to 80)
PORT="${PORT:-80}"
echo "Configuring Nginx to listen on port ${PORT}..."
sed -i "s/listen 80;/listen ${PORT};/g" /etc/nginx/http.d/default.conf
sed -i "s/listen \[::\]:80;/listen [::]:${PORT};/g" /etc/nginx/http.d/default.conf

# Ensure SQLite file exists. Seed only on a brand-new / empty database so that
# admin edits are never overwritten on restart.
FRESH_DB=false
DB_FILE="${DB_DATABASE:-$APP_DIR/database/database.sqlite}"
mkdir -p "$(dirname "$DB_FILE")"
if [ ! -s "$DB_FILE" ]; then
    echo "Creating empty SQLite database at ${DB_FILE}..."
    touch "$DB_FILE"
    FRESH_DB=true
fi

# Ensure storage directory structure
mkdir -p "$APP_DIR/storage/framework/cache/data" \
         "$APP_DIR/storage/framework/sessions" \
         "$APP_DIR/storage/framework/views" \
         "$APP_DIR/storage/logs" \
         "$APP_DIR/storage/app/public" \
         "$APP_DIR/bootstrap/cache"

# Ensure .env exists (real values come from the host's environment variables)
if [ ! -f "$APP_DIR/.env" ]; then
    cp "$APP_DIR/.env.example" "$APP_DIR/.env" 2>/dev/null || touch "$APP_DIR/.env"
fi

# APP_KEY must be provided by the host in production (stable across deploys)
if [ -z "$APP_KEY" ] && ! grep -q "^APP_KEY=base64:" "$APP_DIR/.env" 2>/dev/null; then
    echo "WARNING: APP_KEY is not set. Generating a temporary key (sessions will reset on every restart)."
    echo "         Run 'php artisan key:generate --show' locally and set it as the APP_KEY env var."
    php artisan key:generate --force
fi

# Fix file permissions for www-data
chown -R www-data:www-data "$APP_DIR/storage" "$APP_DIR/bootstrap/cache" "$(dirname "$DB_FILE")"
chmod -R 775 "$APP_DIR/storage" "$APP_DIR/bootstrap/cache" "$(dirname "$DB_FILE")"

# Clear stale caches from the build, then migrate
php artisan optimize:clear >/dev/null 2>&1 || true

echo "Running database migrations..."
php artisan migrate --force

if [ "$FRESH_DB" = "true" ] || [ "${RUN_SEEDERS:-false}" = "true" ]; then
    echo "Seeding database..."
    php artisan db:seed --force
else
    echo "Existing database detected - skipping seeders (set RUN_SEEDERS=true to force)."
fi

# Storage link (uploaded post images)
php artisan storage:link >/dev/null 2>&1 || true

# Cache config, routes, views, events + Filament components & icons
echo "Optimizing Laravel..."
php artisan optimize
php artisan filament:optimize || true

# Files created by artisan above run as root; hand them back to www-data
chown -R www-data:www-data "$APP_DIR/storage" "$APP_DIR/bootstrap/cache" "$(dirname "$DB_FILE")"

echo "Starting Supervisor..."
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
