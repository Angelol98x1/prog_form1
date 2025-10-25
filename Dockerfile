FROM php:8.2-fpm

# Instalar dependencias
RUN apt-get update && apt-get install -y \
    git curl libpng-dev libonig-dev libxml2-dev \
    zip unzip libzip-dev libpq-dev

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Instalar extensiones PHP (IMPORTANTE: pgsql)
RUN docker-php-ext-install pdo pdo_mysql pdo_pgsql pgsql mbstring exif pcntl bcmath gd zip

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . .

# Instalar dependencias
RUN composer install --no-dev --optimize-autoloader

# Configurar permisos (esto funciona en Render/Linux)
RUN chmod -R 775 storage bootstrap/cache

# Optimizar Laravel (IMPORTANTE)
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

EXPOSE 8000
CMD php artisan serve --host=0.0.0.0 --port=8000