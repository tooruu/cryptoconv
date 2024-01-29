FROM php:8.3.2-apache

WORKDIR /var/www/html

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y libzip-dev zip
RUN docker-php-ext-install pdo pdo_mysql bcmath zip

COPY --chmod=775 . .

ENV COMPOSER_ALLOW_SUPERUSER=1
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
