FROM php:7.4-apache

# Instalar extensiones necesarias de PHP para posgresql
RUN apt-get update && apt-get install -y \
    libpq-dev libzip-dev libpng-dev libjpeg-dev libfreetype6-dev

# Agregar extensiones php habituales
RUN docker-php-ext-install pdo pdo_pgsql zip gd exif bcmath opcache

# Habilitar mod_rewrite de Apache
RUN a2enmod rewrite

COPY ./etc/apache/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY ./books /var/www/html