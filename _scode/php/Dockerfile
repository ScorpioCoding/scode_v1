FROM php:8.1.2-fpm

RUN apt update && apt upgrade -y && apt install -y mailutils msmtp msmtp-mta zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
  && docker-php-ext-install intl opcache pdo pdo_mysql  

COPY ./php/msmtprc /etc/msmtprc

COPY ./php/php.ini /etc/php/php.ini

EXPOSE 9000 
