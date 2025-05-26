# Usa una imagen oficial de PHP
FROM php:8.2.12-fpm

# Instala extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    zip unzip curl \
    libpq-dev libpng-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo_mysql gd

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Configura el directorio de trabajo
WORKDIR /var/www/html
COPY . .

# 🔹 Agrega el comando aquí para instalar las dependencias de Laravel
RUN composer install --ignore-platform-reqs --no-dev --optimize-autoloader

# Configura permisos adecuados
RUN chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache

# Expone el puerto 8000
EXPOSE 8000

# Comando para iniciar Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port", "8000"]



