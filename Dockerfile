
# Usa una imagen base de PHP
FROM php:8.1-fpm

# Instalar dependencias necesarias para Laravel y extensiones de PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    git \
    libpq-dev \
    docker-php-ext-configure gd --with-freetype --with-jpeg \
    docker-php-ext-install gd pdo pdo_pgsql \
    apt-get clean \
    rm -rf /var/lib/apt/lists/*  # Limpiar la caché de APT para reducir el tamaño

# Establecer el directorio de trabajo
WORKDIR /var/www

# Copiar los archivos del proyecto a Docker
COPY . .

# Instalar Composer y actualizar a la última versión estable
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer self-update

# Instalar las dependencias de Composer con --no-scripts y --no-plugins para evitar posibles problemas
RUN composer install --no-interaction --prefer-dist --no-scripts --no-plugins

# Exponer el puerto 9000 para PHP-FPM
EXPOSE 9000

# Comando para ejecutar PHP-FPM
CMD ["php-fpm"]
