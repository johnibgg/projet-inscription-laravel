# → Image PHP + FPM + Composer
FROM php:8.1-fpm

# Installer dépendances système + Composer
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg-dev libfreetype6-dev \
    libzip-dev git unzip \
  && docker-php-ext-configure gd --with-freetype --with-jpeg \
  && docker-php-ext-install gd zip \
  && curl -sS https://getcomposer.org/installer | php -- \
       --install-dir=/usr/local/bin --filename=composer

# Copier tout le code
WORKDIR /var/www
COPY . .

# Installer les packages PHP
RUN composer install --no-interaction --optimize-autoloader
RUN php artisan key:generate
RUN php artisan migrate --force

# Exposer le port HTTP
EXPOSE 80

# Lancer PHP intégré sur le dossier public
CMD ["php", "-S", "0.0.0.0:80", "-t", "public"]
