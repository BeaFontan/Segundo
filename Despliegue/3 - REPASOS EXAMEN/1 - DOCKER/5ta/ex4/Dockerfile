FROM ubuntu/apache2
RUN apt update
COPY index.html /var/www/html
ENTRYPOINT ["apachectl", "-D", "FOREGROUND"]
EXPOSE 80