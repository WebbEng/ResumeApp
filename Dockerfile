# Use an official PHP image with Apache
FROM php:8.2-apache

# Copy application files to the container
COPY src/ /var/www/html/

# Install any necessary PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Ensure Apache mod_rewrite is enabled
RUN a2enmod rewrite

# Expose the port the application runs on
EXPOSE 80

# Start Apache in the foreground
CMD ["apache2-foreground"]
g