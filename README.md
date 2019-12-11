# Consultorio

## Programas necesarios
* Git
* Wampserver (agregar todos los archivos binarios a las variables de entorno)
* composser (php)
## Configuraciones una vez clonado
* crear la base de datos CREATE DATABASE nombreDB;
* correr el comando CLI: composer install (dentro de la carpeta del proyecto)
* copiar y pegar el archivo .env.example y cambiarle el nombre a .env modificarlo con el nombre de la base de datos (nombreDB)
* correr el comando CLI: php artisan key:generate (dentro de la carpeta del proyecto)
* correr el comando CLI: php artisan migrate (dentro de la carpeta del proyecto)
## Para ponerlo en localhost
1. En httpd-vhosts.conf
- DocumentRoot "${INSTALL_DIR}/www/consultorio/public"
- <Directory "${INSTALL_DIR}/www/consultorio/public/">
2. En httpd.conf
- DocumentRoot "${INSTALL_DIR}/www/consultorio/public/"
- <Directory "${INSTALL_DIR}/www/consultorio/public/">