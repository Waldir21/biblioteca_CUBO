# Usa una imagen base de PHP con Apache
FROM php:8.3.20-apache

# Instala dependencias necesarias, incluyendo PostgreSQL y herramientas comunes
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    git \
    unzip  # Asegúrate de tener git y unzip, que son necesarios para Composer

# Instala las extensiones de PHP necesarias para Laravel (gd, pdo, pdo_mysql, pdo_pgsql)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql pdo_pgsql

# Copia los archivos de tu proyecto Laravel al contenedor
COPY . /var/www/html/

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Asegúrate de que los permisos de los archivos sean correctos
RUN chown -R www-data:www-data /var/www/html

# Instala dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar clear-cache  # Limpiar caché de Composer

# Instala las dependencias de Laravel
RUN php composer.phar install --no-interaction --prefer-dist

# Exponiendo el puerto 80
EXPOSE 80
