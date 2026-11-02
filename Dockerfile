FROM php:8.2-fpm-alpine

# Set working directory
WORKDIR /var/www/html

# Runtime packages (kept in the final image)
RUN apk add --no-cache \
    nginx \
    supervisor \
    curl \
    bash \
    libpng \
    libjpeg-turbo \
    freetype \
    libzip \
    icu-libs

# PHP extensions (build deps are removed afterwards to keep the image small).
# pdo_sqlite and mbstring are already compiled into the official image.
RUN apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        libpng-dev \
        libjpeg-turbo-dev \
        freetype-dev \
        libzip-dev \
        icu-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        gd \
        zip \
        intl \
        bcmath \
        opcache \
    && apk del .build-deps

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# PHP production tuning (OPcache, upload limits, php-fpm pool)
COPY docker/php.ini /usr/local/etc/php/conf.d/zz-production.ini
COPY docker/php-fpm.conf /usr/local/etc/php-fpm.d/zz-pool.conf

# Copy configuration files
COPY docker/nginx.conf /etc/nginx/http.d/default.conf
COPY docker/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY docker/entrypoint.sh /entrypoint.sh

# Ensure entrypoint has LF line endings and is executable
RUN tr -d '\r' < /entrypoint.sh > /entrypoint_fixed.sh \
    && mv /entrypoint_fixed.sh /entrypoint.sh \
    && chmod +x /entrypoint.sh

# Install PHP dependencies first (better layer caching)
COPY composer.json composer.lock ./
RUN composer install --no-dev --no-scripts --no-autoloader --no-interaction --prefer-dist

# Copy application files
COPY . /var/www/html

# Base .env (no secrets here - APP_KEY etc. come from the host's env vars)
RUN cp .env.example .env \
    && composer dump-autoload --optimize --no-dev \
    && php artisan package:discover --ansi

# Build frontend assets with Vite, then drop Node to slim the image
RUN apk add --no-cache --virtual .node-deps nodejs npm \
    && (npm ci || npm install) \
    && npm run build \
    && rm -rf node_modules \
    && apk del .node-deps

# Default environment setup (override on the host)
ENV APP_ENV=production
ENV APP_DEBUG=false
ENV LOG_CHANNEL=stderr
ENV LOG_LEVEL=warning
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/var/www/html/database/database.sqlite
ENV SESSION_DRIVER=file
ENV CACHE_STORE=file
ENV QUEUE_CONNECTION=sync

EXPOSE 80 10000

ENTRYPOINT ["/entrypoint.sh"]
