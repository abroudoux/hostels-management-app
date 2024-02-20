FROM php:8.3-apache

RUN apt-get update -y && apt-get install -y openssl zip unzip git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo pdo_mysql bcmath

WORKDIR /app

COPY . /app

RUN composer install

RUN cp .env.example .env

RUN php artisan key:generate