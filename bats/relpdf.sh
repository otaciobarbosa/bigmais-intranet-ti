#! /bin/bash
#

stty -isig
clear
echo " Informe o nome do SPOOL e tecle ENTER: "
echo ""
read opcao

cd /u/sistema/bigmais/sist/rel/$opcao /u/rede/trb/$opcao'.txt'
cat $opcao |tr -d "\@" > $opcao'_pdf'

if [ $? != 1 ]
	then
	echo ""
	echo " Arquivo criado com SUCESSO !!! Tecle <Enter> !"
	echo ""
	read tecla
	exit 0
fi

echo ""
echo " Ocorreu ERRO!!! Tecle <Enter> !"
echo ""
read tecla
