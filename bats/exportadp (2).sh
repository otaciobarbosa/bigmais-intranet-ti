#! /bin/bash
#
DIA=`date +%d-%m-%y|awk -F"-" '{print $3$2}'`
cat /u/sistema/bigmais/sist/rel/conv${DIA} |grep ","  |  grep -v Total|  cut -c12-19,21-34,36-67,86-95 --output-delimite=";"|  tr -d "."|  tr -d "/"|  sed s/,/./ |  tr -d " "      > /u/rede/csv/conv${DIA}.csv


if [ $? != 1 ]
	then
	echo " EXPORTACAO CONVENIOS FUNCIONARIOS"
	echo " ------------------------------------------------"
	echo " ARQUIVO: conv${DIA} EXPORTADO COM SUCESSO !!!"
	echo " ------------------------------------------------"
	echo "Tecle <enter> para sair"
	read tecla
	exit 0
fi

echo ""
echo " Ocorreu ERRO. Copia nao realizada !!! Tecle <Enter> !"
echo ""
read tecla