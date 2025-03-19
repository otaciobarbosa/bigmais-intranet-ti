#!/bin/bash
DIA=`date +%d-%m-%y|awk -F"-" '{print $1$2$3}'`
rsync -Ravz 192.168.0.240::rep /var/www/html/intra/sistemas/rep/import
mv /var/www/html/intra/sistemas/rep/import/rep$DIA.csv /var/www/html/intra/sistemas/rep/import/repimporta.csv
mysql -u root -p'bigmais.123' rep < /usr/bin/importarep.sql
rm /var/www/html/intra/sistemas/rep/import/repimporta.csv
