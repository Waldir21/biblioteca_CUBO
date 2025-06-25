# Imagen base de PHP con Apache
FROM php:8.3.20-apache

# Instala dependencias necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    git \
    unzip

# Extensiones PHP necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql pdo_pgsql

# Copiar proyecto al contenedor
COPY . /var/www/html/

# ⚠️ CAMBIAR DocumentRoot de Apache a /public
RUN sed -i 's|/var/www/html|/var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# ⚠️ Activar mod_rewrite para Laravel
RUN a2enmod rewrite

# ⚠️ Dar permisos a Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install --no-interaction --prefer-dist

# Exponer el puerto
EXPOSE 80
