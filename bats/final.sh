# DIA=`date +%d-%m-%y|awk -F"-" '{print $3$2}'`
# cat /var/www/html/intra/sistemas/dp/conv/imp/imp${DIA}.csv|  awk -F";" '{printf "%4s %22s %35s%15s N \n", $1,$2,$3,$3}'  > /var/www/html/intra/sistemas/dp/conv/convfinal${DIA}.txt
cat /var/www/html/intra/sistemas/dp/conv/imp2006.csv|  awk -F";" '{printf "%4s %22s %35s%15s N \n", $1,$2,$3,$3}'  > /var/www/html/intra/sistemas/dp/conv/convfinal2006.txt
