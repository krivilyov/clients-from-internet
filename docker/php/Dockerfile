FROM php:5.6-fpm-alpine

WORKDIR /var/www/project

RUN docker-php-ext-install pdo pdo_mysql

CMD ["php-fpm"]
