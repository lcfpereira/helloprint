FROM nimmis/apache-php7
RUN apt install php7.1-bcmath
ADD src /var/www/html/
RUN cd /var/www/html/ && composer install
