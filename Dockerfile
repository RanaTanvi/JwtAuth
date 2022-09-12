FROM php:7.4.29-fpm
RUN docker-php-ext-install pdo pdo_mysql mysqli
RUN apt update
RUN apt install pkg-config
RUN apt-get install -y \
    libonig-dev \
    && docker-php-ext-install mbstring \
    && docker-php-ext-enable mbstring

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

