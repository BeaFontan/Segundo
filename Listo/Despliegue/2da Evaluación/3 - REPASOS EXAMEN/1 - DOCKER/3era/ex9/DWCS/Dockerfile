FROM php:8.0-apache

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Install PHP extensions
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev zip unzip && rm -rf /var/lib/apt/lists/* \
	&& docker-php-ext-configure gd --with-jpeg=/usr \
	&& docker-php-ext-install gd
RUN docker-php-ext-install mysqli

VOLUME /var/www/html

CMD ["apache2-foreground"]

RUN apt-get update
RUN docker-php-ext-install pdo pdo_mysql
#SOAP
#RUN apt-get install -y libxml2-dev
#RUN docker-php-ext-install soap

#Xdebug
RUN pecl install xdebug-3.1.2
ADD xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
