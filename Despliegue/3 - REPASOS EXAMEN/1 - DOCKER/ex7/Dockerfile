from debian

run apt update
run apt -y install apache2
run apt -y install php
run apt -y clean

entrypoint ["apachectl", "-D", "FOREGROUND"]
expose 80