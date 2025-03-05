FROM debian
RUN apt update
RUN apt -y install apache2
RUN apt -y install php
RUN apt -y clean
ENTRYPOINT ["apachectl", "-D", "FOREGROUND"]
EXPOSE 80