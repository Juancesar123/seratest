FROM php:8.1-fpm
# Copy composer.lock and composer.json
COPY composer.lock composer.json /var/www/html/
# Set working directory
WORKDIR /var/www/html
# Install dependencies
RUN sed -i 's/9000/3001/' /usr/local/etc/php-fpm.d/zz-docker.conf
RUN apt-get update && apt-get install -y \
build-essential \
libmcrypt-dev \
mariadb-client \
libpng-dev \
libjpeg62-turbo-dev \
libfreetype6-dev \
locales \
zip \
jpegoptim optipng pngquant gifsicle \
vim \
unzip \
git \
redis \
curl
# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*
# Install extensions
RUN docker-php-ext-install pdo_mysql exif pcntl
RUN docker-php-ext-enable pdo_mysql \
&& pecl install -o -f redis \
    && docker-php-ext-enable redis
RUN docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/
RUN docker-php-ext-install gd

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
# Add user for laravel application
# Copy existing application directory contents
COPY . /var/www/html
# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www/html
# Change current user to www
USER www-data
# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
