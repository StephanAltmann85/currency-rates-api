FROM php:8.3-fpm-alpine

RUN apk add --update --no-cache --virtual .build-dependencies $PHPIZE_DEPS \
        && pecl install apcu \
        && docker-php-ext-enable apcu \
        && pecl clear-cache \
        && apk del .build-dependencies

RUN docker-php-ext-install pdo pdo_mysql opcache

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
EXPOSE 9000
CMD php-fpm
