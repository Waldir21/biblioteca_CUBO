# Usa una imagen base de PHP con Apache
FROM php:8.3.20-apache

# Instala dependencias necesarias, incluyendo PostgreSQL
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    git \
    unzip \
    nano  # nano para editar el archivo de configuración de Apache

# Instala las extensiones de PHP necesarias para Laravel (gd, pdo, pdo_mysql, pdo_pgsql)
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql pdo_pgsql

# Copia los archivos de tu proyecto Laravel al contenedor
COPY . /var/www/html/

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Configuración de Apache para usar la carpeta 'public' como DocumentRoot
RUN sed -i 's|/var/www/html|/var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Habilita el módulo rewrite de Apache
RUN a2enmod rewrite

# Instala dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar install --no-interaction --prefer-dist

# Exponiendo el puerto 80
EXPOSE 80
