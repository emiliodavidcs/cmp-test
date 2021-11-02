FROM php:7.4-cli

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN apt -y update
RUN apt -y install git zip unzip libyaml-dev

RUN pecl install yaml && docker-php-ext-enable yaml

COPY .. /var/www/cmp-app
WORKDIR /var/www/cmp-app

CMD [ "php", "-a" ]