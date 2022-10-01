FROM php:8.1-fpm

WORKDIR /var/www/html

ARG UID=1000
ARG GID=$UID
RUN groupmod -g $GID www-data
RUN usermod -u $UID -d /home/www-data www-data

RUN apt-get update && apt-get install -y libzip-dev zip
RUN docker-php-ext-install zip

#install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer