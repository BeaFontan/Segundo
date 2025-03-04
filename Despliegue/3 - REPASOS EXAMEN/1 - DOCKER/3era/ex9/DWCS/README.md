# PHPApacheXDebug

Repositorio no que se monta un entorno para programación en PHP co depurador Xdebug
:

3 contedores docker que se inician co docker-compose:

- Apache con PHP-8.0 e librerías PDO para mysql, e Xdebug instalado: php-apache-mysql-XDebug

- mysql: dbxdebug

- phpmyadmin

E o depurador XDebug, e a configuración de Xdebug para VSCode no ficheiro oculto .vscode

Para traballar con el: 

1- Clona o Repositorio na carpeta de usuario: por exemplo se quero clonar estas carpetas en /home/nacho/proba, poñeríame nesa carpeta e faría (ollo co punto final para que a copie na carpeta actual):

git clone https://gitlab.iessanclemente.net/onacho/phpapachexdebug.git .

Dá permisos á carpeta www, e executa desde a carpeta de usuario:

- docker-compose up -d 

2- Para que funcione o XDebug tes que iniciar o vscode desde a mesma carpeta de usuario, para que colla a configuración, coa orde 'code .' :

- code .
