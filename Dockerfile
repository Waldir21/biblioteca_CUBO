# Usa una imagen base de PHP sin Apache
FROM php:8.3.20-cli

# Instala dependencias necesarias, incluyendo PostgreSQL y herramientas comunes
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/*  # Limpiar lista de paquetes

# Instala las extensiones de PHP necesarias para Laravel
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd pdo pdo_mysql pdo_pgsql

# Copia los archivos de tu proyecto Laravel al contenedor
COPY . /var/www/html/

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Asegúrate de que los permisos sean correctos
RUN chown -R www-data:www-data /var/www/html

# Instala dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php
RUN php composer.phar clear-cache
RUN php composer.phar install --no-interaction --prefer-dist

# Ejecuta el servidor PHP en el puerto 80
CMD php artisan serve --host=0.0.0.0 --port=80

# Exponiendo el puerto 80
EXPOSE 80
