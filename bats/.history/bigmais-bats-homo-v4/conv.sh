DIA=`date +%d-%m-%y|awk -F"-" '{print $3$2}'`
mysql -u root -p"bigmais.123" < conv${DIA}.sql