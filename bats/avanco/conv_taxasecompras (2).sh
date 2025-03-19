#! /bin/bash
#

stty -isig
clear
echo " Informe o nome do SPOOL a copiar e tecle ENTER: "
echo ""
read opcao

dos2unix /u/sistema/bigmais/sist/rel/$opcao
DIA=`date +%d-%m-%y|awk -F"-" '{print $1$2$3}'`
cat /u/sistema/bigmais/sist/rel/$opcao |cut -c1-132|grep ","|grep "/"|grep -v "Total do Cliente" |tr -d "."  > /tmp/limpo$DIA
awk  '{printf "%1s%7d %19s %55s %267d \n", $6"000000", $3, $4, $10, $1}' /tmp/limpo$DIA  | tr -d "/#" |sed 's/130000/20130000/'|sed 's/\-/ /' > /u/sist/trb/taxas$DIA.txt
awk  '{printf "%1s%7d %19s %54s %267d \n", $6"000000", $3, $4, $9, $1}' /tmp/limpo$DIA  | tr -d "/#" |sed 's/130000/20130000/'|sed 's/\-/ /' > /u/sist/trb/vendas$DIA.txt



#cp /u/sistema/bigmais/sist/rel/$opcao /u1/rel

if [ $? != 1 ]
	then
	echo ""
	echo " Arquivos cconvertidos com SUCESSO !!! Nomes:"
	echo taxas$DIA.txt
	echo vendas$DIA.txt
	echo ""
	echo "tecle <enter>"
	read tecla
	exit 0
fi

echo ""
echo " Ocorreu ERRO. Copia nao realizada !!! Tecle <Enter> !"
echo ""
read tecla
