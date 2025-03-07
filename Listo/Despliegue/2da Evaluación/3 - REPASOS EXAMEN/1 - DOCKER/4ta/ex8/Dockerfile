FROM alpine
RUN apk update
RUN apk add apache2
RUN apk add php-apache2
ENTRYPOINT ["httpd", "-D", "FOREGROUND"]
EXPOSE 80