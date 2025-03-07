from alpine

run apk update
run apk add apache2
run apk add php-apache2


ENTRYPOINT ["httpd", "-D", "FOREGROUND"]
expose 80