FROM php:7.3-apache 
#FROM php:7.1-apache
#FROM php:5.6-apache
RUN docker-php-ext-install mysqli
