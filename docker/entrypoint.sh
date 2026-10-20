#!/bin/sh
set -e

# Port configuration for Render ($PORT is provided by Render, defaults to 80)
PORT="${PORT:-80}"
echo "Configuring Nginx to listen on port ${PORT}..."
sed -i "s/listen 80;/listen ${PORT};/g" /etc/nginx/http.d/default.conf
sed -i "s/listen \[::\]:80;/listen [::]:${PORT};/g" /etc/nginx/http.d/default.conf

# Ensure SQLite file exists
mkdir -p /var/www/html/database
if [ ! -f /var/www/html/database/database.sqlite ]; then
    echo "Creating database.sqlite..."
    touch /var/www/html/database/database.sqlite
fi

# Ensure storage directory structure
mkdir -p /var/www/html/storage/framework/cache/data \
         /var/www/html/storage/framework/sessions \
         /var/www/html/storage/framework/views \
         /var/www/html/storage/logs \
         /var/www/html/storage/app/public \
         /var/www/html/bootstrap/cache

# Ensure .env exists
if [ ! -f /var/www/html/.env ]; then
    echo "Creating .env file..."
    cp /var/www/html/.env.example /var/www/html/.env 2>/dev/null || touch /var/www/html/.env
fi

# Ensure APP_KEY exists
if [ -z "$APP_KEY" ]; then
    if ! grep -q "APP_KEY=base64:" /var/www/html/.env 2>/dev/null; then
        echo "Generating application key..."
        php artisan key:generate --force
    fi
fi

# Fix file permissions for www-data
chown -R www-data:www-data /var/www/html/storage \
                           /var/www/html/bootstrap/cache \
                           /var/www/html/database \
                           /var/www/html/.env
chmod -R 775 /var/www/html/storage \
             /var/www/html/bootstrap/cache \
             /var/www/html/database
chmod 664 /var/www/html/.env

# Run database migrations and seeding
echo "Running database migrations..."
php artisan migrate --force

echo "Running database seeders..."
php artisan db:seed --force

# Storage link
php artisan storage:link || true

# Cache configurations
echo "Optimizing Laravel cache..."
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

echo "Starting Supervisor..."
exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
