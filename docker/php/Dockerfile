FROM php:8.1.1-fpm-alpine3.15

RUN apk add --update libpq-dev \
  && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
  && docker-php-ext-install pdo pdo_pgsql pgsql

RUN mkdir /var/log/php

RUN chown -R 1000:1000 /var/log/

USER 1000:1000
