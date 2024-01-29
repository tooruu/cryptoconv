FROM php:8.3.2-apache

WORKDIR /var/www/html

RUN a2enmod rewrite

RUN docker-php-ext-install pdo pdo_mysql bcmath

COPY . .
RUN chmod -R 775 storage bootstrap/cache

ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN composer update
RUN composer install
RUN composer dump-autoload
