# Use the official PHP image with a specific version
FROM php:8.2-fpm

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd zip pdo pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

# Set working directory
WORKDIR /var/www/html

# Copy Composer binary and set up Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy the Laravel application to the container
COPY . .

# Install PHP dependencies
RUN composer install

# Expose port 8081
EXPOSE 8082

# Start the PHP-FPM server
CMD ["php-fpm"]

