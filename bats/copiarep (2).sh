DIA=`date +%d-%m-%y|awk -F"-" '{print $1$2$3}'`
cp -v /u/rede/wms/rep$DIA.csv /u/rede/Reposicao >> /var/log/copiarep.log
chmod 777 /u/rede/Reposicao/rep$DIA.csv

