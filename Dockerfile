FROM php:8.1

WORKDIR /var/www/html

ARG UID=1000
ARG GID=$UID
RUN groupmod -g $GID www-data
RUN usermod -u $UID -d /home/www-data www-data

RUN apt-get update && apt-get install -y ${PHPIZE_DEPS} libzip-dev zip
RUN docker-php-ext-install zip
RUN pecl install swoole redis
RUN docker-php-ext-enable swoole redis
RUN apt-get remove -y ${PHPIZE_DEPS}

#install composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

CMD ["php", "artisan", "octane:start", "--host=0.0.0.0", "--port=8000"]