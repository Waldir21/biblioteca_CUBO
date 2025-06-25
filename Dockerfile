# Usa una imagen base de PHP con Apache
FROM php:8.3.20-apache

# Instala dependencias necesarias, incluyendo PostgreSQL y php-cli
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    php-cli  # Añadir php-cli para usar Composer

# Instala las extensiones de PHP necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql pdo_pgsql

# Copia los archivos de tu proyecto Laravel al contenedor
COPY . /var/www/html/

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Instala dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install

# Exponiendo el puerto 80
EXPOSE 80
