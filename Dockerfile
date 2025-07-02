FROM php:8.1-apache
COPY . /var/www/html/
WORKDIR /var/www/html
RUN a2enmod rewrite && \
    mv /etc/apache2/sites-available/000-default.conf /etc/apache2/sites-available/000-default.conf.original && \
    echo '<VirtualHost *:80>\n\
        DocumentRoot /var/www/html/public\n\
        <Directory /var/www/html/public>\n\
            Options Indexes FollowSymLinks\n\
            AllowOverride All\n\
            Require all granted\n\
        </Directory>\n\
        ErrorLog ${APACHE_LOG_DIR}/error.log\n\
        CustomLog ${APACHE_LOG_DIR}/access.log combined\n\
    </VirtualHost>' > /etc/apache2/sites-available/000-default.conf