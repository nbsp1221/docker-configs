FROM php:7.4-fpm

# Install PHP extensions by using docker-php-extension-installer
# https://github.com/mlocati/docker-php-extension-installer
ADD https://raw.githubusercontent.com/mlocati/docker-php-extension-installer/master/install-php-extensions /usr/local/bin/
RUN chmod uga+x /usr/local/bin/install-php-extensions && \
    sync && \
	install-php-extensions mysqli pdo_mysql

# Use the default production configuration
COPY php.ini-production $PHP_INI_DIR/php.ini
