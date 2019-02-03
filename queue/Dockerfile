FROM nimmis/apache-php7
RUN apt-get update && apt-get install -y php7.0-bcmath 
ADD src /var/www/html/
RUN cd /var/www/html/ && composer install
