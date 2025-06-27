FROM php:8.3-apache

# 1. Instalar dependencias y extensiones PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev \
    libzip-dev \
    git \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo pdo_mysql pdo_pgsql zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# 2. Configurar Apache para Laravel
RUN a2enmod rewrite
COPY .docker/apache.conf /etc/apache2/sites-available/000-default.conf

# 3. Establecer directorio de trabajo
WORKDIR /var/www/html

# 4. Copiar archivos del proyecto
COPY . .

# 5. Instalar Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# 6. Ajustar permisos ANTES de composer install (¡Clave!)
RUN mkdir -p storage/framework/{sessions,views,cache} \
    && chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# 7. Instalar dependencias
RUN composer install --no-interaction --prefer-dist --no-scripts

# 8. Asegurar permisos después de la instalación
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80