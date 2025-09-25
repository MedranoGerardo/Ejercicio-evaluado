FROM php:8.2-apache

RUN docker-php-ext-install pdo pdo_mysql mysqli

RUN a2enmod rewrite

RUN printf "<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n" \
    > /etc/apache2/conf-available/z-override.conf \
    && a2enconf z-override

RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf

WORKDIR /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
