#!/bin/bash
chmod -R 777 /var/www/html/importacao_vitruvio
cat /dev/null > /var/log/postgresql/postgresql-9.4-main.log
DIA=`date +%y-%m-%d|awk -F"-" '{print $1$2$3}'`
cd /var/www/html/importacao_vitruvio/imp/ 
wget http://192.168.0.240/importa_carga/preco$DIA.csv
php /var/www/html/importacao_vitruvio/index.php
