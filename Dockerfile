FROM php:8.2-apache

# =========================
# System dependencies
# =========================
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    libonig-dev \
    curl \
    ca-certificates \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        mbstring \
        zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# =========================
# Install Node.js (FAST)
# =========================
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash - \
    && apt-get install -y nodejs

# =========================
# Enable Apache modules
# =========================
RUN a2enmod rewrite

# =========================
# Apache configuration for Laravel
# =========================
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf \
    && echo '<Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>' >> /etc/apache2/apache2.conf \
    && echo 'DirectoryIndex index.php index.html' >> /etc/apache2/apache2.conf

# =========================
# Working directory
# =========================
WORKDIR /var/www/html

# =========================
# Copy application
# =========================
COPY . .

# =========================
# Install Composer
# =========================
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# =========================
# Install PHP dependencies
# =========================
RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction

# =========================
# Build frontend assets
# =========================
RUN npm install && npm run build

# =========================
# Permissions
# =========================
RUN chown -R www-data:www-data storage bootstrap/cache

# =========================
# Expose port
# =========================
EXPOSE 80

# =========================
# Start Apache
# =========================
CMD ["apache2-foreground"]
