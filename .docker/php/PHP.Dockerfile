FROM php:8.0-fpm

# installiert mysql Treiber
RUN docker-php-ext-install pdo pdo_mysql

# Für bessere Fehlermeldungen auf unserem Dev Server
RUN pecl install xdebug && docker-php-ext-enable xdebug
