# Description: Dockerfile for NexaMerchant
FROM php:8.1.29-apache


RUN apt-get update && apt-get install -y \
    unzip \
    libzip-dev \
    libicu-dev \
    libonig-dev \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zlib1g-dev \
    libpng-dev \
    libxml2-dev \
    libzip-dev \
    libonig-dev \
    graphviz \
    curl \
    libpq-dev \
    libssl-dev \
    libmcrypt-dev \
    libmemcached-dev \
    libz-dev \
    libsqlite3-dev \
    libxml2-dev \
    libcurl4-openssl-dev \
    pkg-config \
    libssl-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libmcrypt-dev \
    libpng-dev \
    zlib1g-dev \
    libicu-dev \
    g++ \
    libpcre3-dev \
    libgd-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxpm-dev \
    libwebp-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libxpm-dev \
    libwebp-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl bcmath gd intl opcache calendar sodium


RUN pecl install redis \
    && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer


COPY --from=node:latest /usr/local/bin/node /usr/local/bin/
COPY --from=node:latest /usr/local/lib/node_modules /usr/local/lib/node_modules
RUN ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm \
    && ln -s /usr/local/lib/node_modules/npm/bin/npx-cli.js /usr/local/bin/npx


WORKDIR /var/www/html/NexaMerchant/

COPY . ./

RUN ls -la

RUN a2dissite 000-default.conf
COPY docker/.configs/apache.conf /etc/apache2/sites-available/vhost.conf
RUN a2ensite vhost.conf


# COPY composer.json composer.json
RUN composer update --no-interaction --prefer-dist --optimize-autoloader


RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# setting up project from `src` folder
RUN chmod -R 775 /var/www/html/NexaMerchant/
RUN chown -R www-data:www-data /var/www/html/NexaMerchant/


EXPOSE 80

# Apache
CMD ["apache2-foreground"]
