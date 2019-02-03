FROM nimmis/apache-php7
ADD src /var/www/html/
RUN cp composer.json /var/www/html/
RUN cd /var/www/html/
RUN composer install