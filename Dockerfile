FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Install system dependencies, Nginx, Supervisor, SQLite, and build tools
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    git \
    bash \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libzip-dev \
    icu-dev \
    sqlite-dev \
    oniguruma-dev \
    nodejs \
    npm

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        gd \
        pdo \
        pdo_sqlite \
        mbstring \
        zip \
        intl \
        bcmath \
        opcache

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy configuration files
COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/entrypoint.sh /entrypoint.sh

# Ensure entrypoint has LF line endings and is executable
RUN tr -d '\r' < /entrypoint.sh > /entrypoint_fixed.sh \
    && mv /entrypoint_fixed.sh /entrypoint.sh \
    && chmod +x /entrypoint.sh

# Copy application files
COPY . /var/www/html

# Setup default .env and generate application key
RUN cp .env.example .env \
    && php artisan key:generate --force

# Install PHP dependencies without dev packages
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Build frontend assets with Vite
RUN npm ci || npm install \
    && npm run build

# Default environment setup
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/html/database/database.sqlite
ENV SESSION_DRIVER=file

EXPOSE 80 10000

ENTRYPOINT ["/entrypoint.sh"]
