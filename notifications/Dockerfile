FROM php:8.1-apache

# Set working directory
WORKDIR /var/www/html

# Install dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpq-dev \
    redis-tools \
        && pecl install redis \
        && docker-php-ext-enable redis \
        && docker-php-ext-install pdo pdo_pgsql

# Enable Apache modules
RUN a2enmod rewrite

# Copy Apache configuration file
COPY symfony.conf /etc/apache2/sites-available/000-default.conf

# Install Symfony
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer



# Copy existing Symfony application into container
COPY . .

# Copy .env file
COPY .env.example .env

# Install project dependencies
RUN composer install --no-dev --optimize-autoloader



RUN chown -R www-data:www-data /var/www/html/var /var/www/html/vendor

RUN php bin/console cache:clear --env=dev --no-debug
RUN php bin/console cache:warmup --env=dev --no-debug


# Expose port
EXPOSE 80

# Start Apache
CMD ["apache2-foreground"]
