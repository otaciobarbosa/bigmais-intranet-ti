#! /bin/bash
#

stty -isig
clear
echo " Informe o nome do SPOOL  e o arquivo convertido. Lembre-se que precisa passar pelo programa de conversao antes.  "
echo "Tecle [enter]"
read spool converte
echo $spool $converte

LOCSPOOL="/u/sistema/bigmais/sist/rel/"
LOCCONV="/u/sist/trb/EXPORTA/"

dos2unix /u/sistema/bigmais/sist/rel/$spool
dos2unix /u/sist/trb/EXPORTA/$converte
DIA=`date +%d-%m-%y|awk -F"-" '{print $1$2$3}'`
echo $LOCSPOOL$spool
echo  $LOCCONV$converte

cat $LOCSPOOL$spool  |cut -c1-104|grep ","|grep -v "SOMA - TOTAL" |grep -v "SOMA - PA"|cut -c47-74,79-85 --output-delimite=';' > /tmp/nomech$DIA.csv
paste -d";" $LOCCONV$converte /tmp/nomech$DIA.csv  |cut -c1-96,376-410,355-364 --output-delimite=";" |awk -F";" '{printf "%1s %13s  %s %223s \n", $1, $4, $3, $2}' > /u/sist/trb/EXPORTA/chequefinal$DIA.txt


if [ $? != 1 ]
	then
	echo ""
	echo " Arquivos cconvertidos com SUCESSO !!! Nomes:"
	echo $LOCCONV"chequefinal"$DIA.txt
	echo ""
	echo "tecle <enter>"
	read tecla
	exit 0
fi

echo ""
echo " Ocorreu ERRO. Copia nao realizada !!! Tecle <Enter> !"
echo ""
read tecla
