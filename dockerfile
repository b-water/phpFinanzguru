FROM php:cli-alpine

# Add User
#RUN addgroup -S $USER
#RUN adduser $USER --disabled-password -G $USER

ENV BASE_DIR=/var/www

# Copy composer.lock and composer.json
COPY composer.lock composer.json $BASE_DIR/

# Set working directory
WORKDIR $BASE_DIR

# Update System, Install required packages
RUN apk update && apk upgrade && apk add --no-cache g++ make libzip-dev libpng-dev autoconf libxml2-dev

RUN curl -o /tmp/composer-setup.php https://getcomposer.org/installer \
&& curl -o /tmp/composer-setup.sig https://composer.github.io/installer.sig \
# Make sure we're installing what we think we're installing!
&& php -r "if (hash('SHA384', file_get_contents('/tmp/composer-setup.php')) !== trim(file_get_contents('/tmp/composer-setup.sig'))) { unlink('/tmp/composer-setup.php'); echo 'Invalid installer' . PHP_EOL; exit(1); }" \
&& php /tmp/composer-setup.php --no-ansi --install-dir=/usr/local/bin --filename=composer --snapshot \
&& rm -f /tmp/composer-setup.*

# Copy existing application directory contents
COPY . $BASE_DIR

# Copy existing application directory permissions
#COPY --chown=$USER:$USER . $BASE_DIR

RUN docker-php-ext-configure tokenizer
RUN docker-php-ext-configure dom

# Install PHP Extensions
RUN docker-php-ext-install gd zip dom

# Install & Enable xdebug
RUN pecl install -f xdebug && docker-php-ext-enable xdebug

# Change current user to www
#USER $USER
