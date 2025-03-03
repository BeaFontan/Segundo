FROM ubuntu/apache2
LABEL maintainer="bea@bea.com"
RUN apt update
COPY index.html /var/www/html
ENTRYPOINT [ "apachectl", "-D", "FOREGROUND" ]