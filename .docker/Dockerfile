FROM php:7.4-cli

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt -y update
RUN apt -y install git zip unzip libyaml-dev

RUN pecl install yaml

COPY config/php-ext-extra.ini "$PHP_INI_DIR/conf.d/php-ext-extra.ini"

COPY .. /var/www/cmp-app
WORKDIR /var/www/cmp-app

CMD [ "php", "-a" ]