FROM php:8.3-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Permissions
RUN chmod -R 775 storage bootstrap/cache

# Create storage link (safe even if exists)
RUN php artisan storage:link || true

# Start server (Railway injects PORT)
CMD php artisan migrate --force && php artisan db:seed --force && php -S 0.0.0.0:${PORT} -t public


