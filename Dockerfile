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

# Cambiar el DocumentRoot a public/
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Habilitar URLs limpias
RUN a2enmod rewrite

# Dar permisos a storage y bootstrap
RUN chown -R www-data:www-data storage bootstrap/cache

# Cambiar permisos para que Apache pueda acceder a los archivos
RUN chmod -R 775 storage bootstrap/cache

# Instalar dependencias PHP de Laravel
RUN composer install --no-dev --optimize-autoloader

# Crear enlace simbólico de storage
RUN php artisan storage:link

# Exponer el puerto 80
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]
