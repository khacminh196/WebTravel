FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    curl \
    # build-essential \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    # libxml2-dev \
    # g++ \
    # make \
    # autoconf \
    # openssl \
    git \
    # bash \
    libzip-dev \
    zip
    # unzip \
    # ffmpeg \
    # imagemagick libmagickwand-dev --no-install-recommends \
    # && pecl install imagick \
    # # && pecl install grpc \
    # && docker-php-ext-enable imagick
    # # && docker-php-ext-enable grpc  

RUN git clone -b 4.2.0 --depth 1 https://github.com/phpredis/phpredis.git /usr/src/php/ext/redis
RUN docker-php-ext-install \
    pdo_mysql \
    redis \
#     opcache \
    gd \
    zip \
  && docker-php-ext-configure gd \
    --with-freetype \
    --with-jpeg

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && chmod +x /usr/local/bin/composer

RUN curl -sL https://deb.nodesource.com/setup_12.x | bash -- &&\
    apt-get install -y nodejs

RUN rm -rf /var/cache/apk/*

# RUN pecl install xdebug \
#     && docker-php-ext-enable xdebug

# COPY install_mecab_php-mecab-docker.sh .
# RUN chmod +x install_mecab_php-mecab-docker.sh && ./install_mecab_php-mecab-docker.sh

WORKDIR /usr/share/nginx/html
