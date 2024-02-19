FROM php:8.3-fpm-alpine

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www
EXPOSE 9000
CMD php-fpm