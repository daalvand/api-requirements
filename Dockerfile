FROM php:8.1-fpm

WORKDIR /var/www/html

ARG UID=1000
ARG GID=$UID
RUN groupmod -g $GID www-data
RUN usermod -u $UID -d /home/www-data www-data

#install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer