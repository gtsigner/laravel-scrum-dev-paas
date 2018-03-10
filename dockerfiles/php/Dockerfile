#可以按照需求切换版本
FROM php:7.1-fpm

MAINTAINER Godtoy <zhaojunlike@gmail.com>
RUN sed -i 's/deb.debian.org/mirrors.aliyun.com/g' /etc/apt/sources.list
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng12-dev \
    && docker-php-ext-install -j$(nproc) iconv mcrypt pdo_mysql mbstring opcache bcmath \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ --enable-bcmath \
    && docker-php-ext-install -j$(nproc) gd

RUN pecl install redis-3.1.5 \
    && pecl install xdebug-2.5.0 \
    && pecl install mongodb \
    && docker-php-ext-enable redis xdebug mongodb

RUN  rm -rf /var/lib/apt/lists/*
