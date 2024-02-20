FROM php:8.3-fpm-alpine

RUN docker-php-ext-install pdo pdo_mysql

WORKDIR /var/www

RUN echo '* */4 * * *    /usr/local/bin/php /var/www/bin/console currency-rates:update' > /etc/crontabs/root

CMD crond -f