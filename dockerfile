FROM php:8.2-apache

# Extensiones
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Habilitar mod_rewrite
RUN a2enmod rewrite

# Permitir .htaccess en public
RUN printf "<Directory /var/www/html/public>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n" \
    > /etc/apache2/conf-available/z-override.conf \
    && a2enconf z-override

# Cambiar DocumentRoot a public
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf \
    && sed -i 's!/var/www/!/var/www/html/public!g' /etc/apache2/apache2.conf

# Copiar el proyecto
COPY . /var/www/html/

# Permisos correctos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

WORKDIR /var/www/html

EXPOSE 80

CMD ["apache2-foreground"]
