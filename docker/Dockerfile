# Używamy oficjalnego obrazu PHP 8.3 z PHP-FPM
FROM php:8.3-fpm

# Instalujemy niezbędne pakiety i rozszerzenia PHP (np. GD, PDO, PDO_PGSQL, Redis)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    libzip-dev \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql zip \
    && pecl install redis \
    && docker-php-ext-enable redis \
    && apt-get clean

RUN apt-get install -y nginx \
    && apt-get clean

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

COPY ./app /var/www

RUN chown -R www-data:www-data /var/www && chmod -R 755 /var/www

COPY ./docker/php.ini /usr/local/etc/php/php.ini

EXPOSE 9000
CMD service nginx start && php-fpm
