
FROM php:8.2-apache
ENV COMPOSER_ALLOW_SUPERUSER=1

RUN docker-php-ext-install pdo pdo_mysql

RUN apt-get update && apt-get install -y nodejs npm


COPY . /var/www/html

WORKDIR /var/www/html

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install

RUN npm install
RUN npm run build

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
