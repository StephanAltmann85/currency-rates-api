FROM php:8.3-fpm-alpine

RUN apk add --update --no-cache --virtual .build-dependencies $PHPIZE_DEPS \
        && pecl install apcu \
        && docker-php-ext-enable apcu \
        && pecl clear-cache \
        && apk del .build-dependencies

RUN docker-php-ext-install pdo pdo_mysql opcache

WORKDIR /var/www

RUN echo '* */4 * * *    /usr/local/bin/php /var/www/bin/console currency-rates:update' > /etc/crontabs/root

CMD crond -f