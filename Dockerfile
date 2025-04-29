# Imagen base con PHP y Apache
FROM php:8.2-apache

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    zip unzip git curl libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar archivos del proyecto
COPY . /var/www/html

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Instalar dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Permitir URLs limpias
RUN a2enmod rewrite

# Dar permisos a storage y bootstrap
RUN chown -R www-data:www-data storage bootstrap/cache
