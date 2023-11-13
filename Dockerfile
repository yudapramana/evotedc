FROM php:8.1-fpm

# Set working directory
WORKDIR /var/www

# Add docker php ext repo
ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install php extensions
# Install dependencies
# Install supervisor
# Add user for laravel application
# add root to www group
RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions pdo_mysql zip exif pcntl gd memcached \
    && apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    unzip \
    git \
    curl \
    lua-zlib-dev \
    libmemcached-dev \
    nginx \
    && apt-get install -y supervisor \
    && apt-get clean && rm -rf /var/lib/apt/lists/* \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && mkdir /var/log/php \
    && touch /var/log/php/errors.log && chmod 777 /var/log/php/errors.log \
    && groupadd -g 1000 www && useradd -u 1000 -ms /bin/bash -g www www

# Copy code to /var/www
COPY --chown=www:www-data . /var/www

# Copy nginx/php/supervisor configs
RUN chmod -R ug+w /var/www/storage \
  && cp docker/supervisor.conf /etc/supervisord.conf \
  && cp docker/php.ini /usr/local/etc/php/conf.d/app.ini \
  && cp docker/nginx.conf /etc/nginx/sites-enabled/default \
  && composer install --optimize-autoloader --no-dev \
  && chmod +x /var/www/docker/run.sh

EXPOSE 80
ENTRYPOINT ["/var/www/docker/run.sh"]