# Usa una imagen oficial de PHP con soporte para Laravel y Composer
FROM php:8.1-fpm

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    zip unzip curl \
    libpq-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo_mysql gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copia los archivos del proyecto al contenedor
WORKDIR /var/www/html
COPY . .

# Instala dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Configura permisos adecuados para almacenamiento y caché
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expone el puerto 8000 para acceder a la aplicación
EXPOSE 8000

# Comando de inicio del servidor Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
