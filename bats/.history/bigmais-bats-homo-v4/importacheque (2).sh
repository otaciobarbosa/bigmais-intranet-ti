dos2unix $1 
dos2unix $2 
DIA=`date +%d-%m-%y|awk -F"-" '{print $1$2$3}'`
cat $1 |cut -c1-104|grep ","|grep -v "SOMA - TOTAL" |grep -v "SOMA - PA"|cut -c47-74,79-85 --output-delimite=';' > nomeecheque$DIA.csv
paste -d";" $2 nomeecheque$DIA.csv |cut -c1-96,376-410,355-364 --output-delimite=";" |awk -F";" '{printf "%1s %13s  %s %223s \n", $1, $4, $3, $2}' > chequefinal$DIA.txt
