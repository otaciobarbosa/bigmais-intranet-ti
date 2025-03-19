#!/bin/sh
###############################################################
# AVANCO INFORMATICA
#
# AUTOR: MARCO POLO G REZENDE <marcopolorezende@yahoo.com.br>
# DATA: 03/05/2011 01:08
# ATUALIZADO: 01/12/2011 11:37 (GRAVANDO PASTA COM CNPJ DA FILIAL + DATA)
#
# GERACAO DE ARQUIVOS TXT COM LAYOUT DE IMPORTACAO NF-E EM LOTE
# PARAMETRO 1: DIRETORIO DE ORIGEM DOS ARQUIVOS XML
# PARAMETRO 2: DIRETORIO DE DESTINO DOS ARQUIVOS TXT
# PARAMETRO 3: DIRETORIO DE DESTINO DOS ARQUIVOS XML PROCESSADOS
###############################################################

# CRIA DIRETÓRIOS CASO NÃO EXISTAM
mkdir -p "$2"
mkdir -p "$3"
data=`date +%Y-%m-%d`

# CRIACAO DE DIRETORIO DE LOG
path="/u/rede/avanco/log-xml/"
mkdir -p $path
log=$path"importador.log"

JAVA_HOME=/usr/lib/java
PATH=$PATH:/usr/lib/java/bin:/usr/lib/java/jre/bin:

for i in `find "$1" -name "*.xml"`
do

	cd "$3"
	cnpj=`grep -io "<dest><cnpj>[0-9]\+</cnpj>" $i | grep -io "[0-9]\+"`
	#data=`grep -io "<dEmi>[0-9]</dEmi>" $i`
	mkdir -p ${cnpj}/${data}
	saida=`echo -n "${3}/${cnpj}/${data}"`
	cd -
	
	java -jar /u/bats/avanco.jar "$i" "$2" "$saida" 2>> $log
	
done
for i in `find "$1" -name "*.XML"`
do

	cd "$3"
	cnpj=`grep -io "<dest><cnpj>[0-9]\+</cnpj>" $i | grep -io "[0-9]\+"`
	#data=`grep -io "<dEmi>[0-9]\+.*</dEmi>" $i`
	mkdir -p ${cnpj}/${data}
	saida=`echo -n "${3}/${cnpj}/${data}"`
	cd -
	
	java -jar /u/bats/avanco.jar "$i" "$2" "$saida" 2>> $log
	
done
cd  /u/rede/xml
chmod 777 -R xml-imp xml-txt
