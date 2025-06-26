FROM php:8.1-fpm

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    git \
    libpq-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql pdo_pgsql mbstring exif \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www

# Copiar solo composer.json primero para cachear la instalación de dependencias
COPY composer.json composer.lock* ./

# Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instalar dependencias (con más detalles en caso de error)
RUN composer install --no-interaction --prefer-dist --no-scripts --no-plugins -vvv || cat composer.lock

# Copiar el resto del proyecto
COPY . .

# Establecer permisos
RUN chown -R www-data:www-data /var/www

EXPOSE 9000