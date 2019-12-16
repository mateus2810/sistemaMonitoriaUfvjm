#FROM php:7.3-apache 
#FROM php:7.1-apache
#FROM php:5.6-apache
FROM php:7.2.2-apache 
  
RUN docker-php-ext-install mysqli \
 && a2enmod rewrite

RUN apt-get update \
 && apt-get install -y mysql-client wget \   
 && apt-get clean

