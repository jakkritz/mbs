# PHP Application
FROM php:7.3-fpm

LABEL maintainer="jakkrit@ppsmartbot.com"

# Install any custom system requirements here
RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Install libraries
RUN apt-get update && \
    apt-get -y install \
        gnupg2 && \
    apt-get update && \
    apt-get -y install \
            g++ \
            git \
            curl \
            libmcrypt-dev \
            imagemagick \
            libfreetype6-dev \
            libcurl3-dev \
            libicu-dev \
            libfreetype6-dev \
            libjpeg-dev \
            libjpeg62-turbo-dev \
            libmagickwand-dev \
            libpq-dev \
            libpng-dev \
            libxml2-dev \
            libxslt1-dev \
            zlib1g-dev \
            default-mysql-client \
            default-libmysqlclient-dev \
            openssh-client \
            nano \
            unzip \
            redis-server \
            libzip-dev \
        --no-install-recommends && \
        apt-get clean && \
        rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN pecl install mcrypt-1.0.2
RUN docker-php-ext-enable mcrypt
RUN docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install zip mbstring pdo bcmath opcache json xsl intl curl pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# Install Node.js
RUN curl -sL https://deb.nodesource.com/setup_12.x | bash
RUN apt-get install --yes nodejs
RUN node -v
RUN npm -v

# Install Yarn
RUN curl -sS https://dl.yarnpkg.com/debian/pubkey.gpg | apt-key add -
RUN echo "deb https://dl.yarnpkg.com/debian/ stable main" | tee /etc/apt/sources.list.d/yarn.list
RUN apt-get update \
    && apt-get install yarn --yes
RUN yarn --version

ENV APP_ENV ${APP_ENV}

# DIR
WORKDIR /var/www/app
COPY . ./

# composer configuration:
COPY ./composer.json ./composer.json

# node configuration
COPY ./package.json ./package.json

# install depencies
RUN composer install --no-interaction
#RUN yarn install

# build assets
#RUN yarn development

# www-data:
RUN chown -R www-data:www-data ./
RUN chown -R www-data:www-data storage

# mode-root:
USER root

CMD ["php-fpm"]
