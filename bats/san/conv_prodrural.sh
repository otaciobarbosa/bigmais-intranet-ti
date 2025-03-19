#! /bin/bash
#

stty -isig
clear
echo " Informe o nome do CSV criado pelo excel: "
read spool 
echo $spool 

LOCSPOOL="/u/rede/trb/sanrede/"
LOCCONV="/u/sist/trb/EXPORTA/"
dos2unix $LOCSPOOL$spool

DIA=`date +%m-%y|awk -F"-" '{print $1-1$2}'`

echo $LOCSPOOL$spool
echo  $LOCCONV$converte

cat $LOCSPOOL$spool |sed 's/ ;/;/g'|sed 's/; /;/' |sed 's/;;//g'|sed 's/; /;/g'|awk -F";" '{printf "%1s %7s  %18s  %52s        %-47s %212s  \n", $1, $2, $3, $4, $5, $6 }'|cut -c1-365 > $LOCCONV"produtor"$DIA.txt



if [ $? != 1 ]
	then
	echo ""
	echo " Arquivos cconvertidos com SUCESSO !!! Nomes:"
	echo $LOCCONV"produtor"$DIA.txt
	echo ""
	echo "tecle <enter>"
	read tecla
	exit 0
fi

echo ""
echo " Ocorreu ERRO. Copia nao realizada !!! Tecle <Enter> !"
echo ""
read tecla
