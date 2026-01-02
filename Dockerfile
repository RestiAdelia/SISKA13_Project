FROM php:8.3-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev libpng-dev libonig-dev nodejs npm \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies & build Vite assets
RUN npm install
RUN npm run build

# Permissions
RUN chmod -R 775 storage bootstrap/cache

# Create storage link
RUN php artisan storage:link || true

# Migrate & seed database, start server
CMD php artisan migrate --force && php artisan db:seed --force && php -S 0.0.0.0:${PORT} -t public
