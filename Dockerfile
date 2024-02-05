# Use an official PHP runtime as a parent image
FROM php:8.2-fpm

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && \
    apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install zip pdo_mysql

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the local package files to the container
COPY . .

# Install application dependencies
RUN composer install --no-scripts

# Expose port 8000 and start Laravel development server
EXPOSE 8000
CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "8000"]
