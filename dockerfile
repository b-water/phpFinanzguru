FROM php:fpm-alpine3.12

# User, UID/GID and Port ENV
ARG USER=www
ENV USER=${USER}

ARG UID=1000
ENV UID=${UID}

ARG PORT=8080
ENV PORT=${PORT}

ENV BASE_DIR=/var/www

# Copy composer.lock and composer.json
COPY composer.lock composer.json $BASE_DIR/

# Set working directory
WORKDIR $BASE_DIR

# Update System
RUN apk update && apk upgrade

# Install dependencies
RUN apk --no-cache add g++ make zip libpng libzip-dev libpng-dev unzip git curl composer autoconf

# Add user for laravel application
RUN addgroup -S $USER
RUN adduser $USER --disabled-password -G $USER

# Copy existing application directory contents
COPY . $BASE_DIR

# Copy existing application directory permissions
COPY --chown=$USER:$USER . $BASE_DIR

# Install PHP Extensions
RUN docker-php-ext-install gd zip

# Install & Enable xdebug
RUN pecl install -f xdebug && docker-php-ext-enable xdebug

# Change current user to www
USER $USER

# Expose port 8080 and start php-fpm server
EXPOSE $PORT
CMD ["php-fpm"]
