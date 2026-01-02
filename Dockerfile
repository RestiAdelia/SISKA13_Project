FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY . .

RUN composer install --no-dev --optimize-autoloader

CMD php artisan serve --host=0.0.0.0 --port=8000
EXPOSE 8000