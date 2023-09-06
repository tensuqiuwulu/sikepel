# Gunakan base image resmi PHP 8.2
FROM php:8.2-cli

# Set working directory di dalam container
WORKDIR /var/www/html

# Install dependensi yang dibutuhkan
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libpq-dev

# Install ekstensi PHP yang diperlukan
RUN docker-php-ext-install pdo pdo_mysql zip gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Expose port 9000 and start PHP server
EXPOSE 9001
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=9001"]
