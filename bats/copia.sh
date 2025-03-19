DIA=`date +%d-%m-%y|awk -F"-" '{print $3$2}'`
cp /var/www/html/intra/sistemas/dp/conv/arqf/convfinal${DIA}.txt /var/www/html/intra/sistemas/dp/conv/export/
