# Usa una imagen base de PHP
FROM php:8.1-fpm

# Instalar las dependencias de Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql

# Establece el directorio de trabajo
WORKDIR /var/www

# Copiar los archivos del proyecto a Docker
COPY . .

# Instalar las dependencias de Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-interaction --prefer-dist

# Exponer el puerto 9000 para PHP-FPM
EXPOSE 9000

# Comando para ejecutar PHP-FPM
CMD ["php-fpm"]
