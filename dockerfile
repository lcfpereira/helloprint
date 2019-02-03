FROM linode/lamp

RUN service apache2 start
RUN service mysql start

