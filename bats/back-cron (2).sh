#!/bin/bash

source /etc/profile
umask 000

## FUNCOES ##

limpa(){
# REMOCAO TOTAL DE ALGUNS TIPOS DE
# ARQUIVOS DE DETERMINADOS DIRETORIOS
rm -rfv /u/sist/tmp/* /u/sist/pro/* /u/sist/tmp-sped/* /u/sist/sped/*.obs /u/sist/sped/ne* /u/sist/sped/ne/*

# MANTER SOMENTE OS ULTIOMS 15 BACKUPS
rm -rfv /u/rede/backs/back-$(date +%y%m%d -d '-15 day')

# MANTER ARQUIVOS SOMENTE DOS ULTIMOS 15 DIAS DE /u/javascript/req,resp
LISTADELDIR="javascript/req javascript/resp"
for DIR in $LISTADELDIR; do
	find /u/$DIR -type f -ctime +15 -print -exec rm -fv {} \;
done

# MANTER ARQUIVOS SOMENTE DOS ULTIMOS 30 DIAS
LISTADELDIR="sist/arqe sist/trb sist/rel sist/n sist/e sist/o"
for DIR in $LISTADELDIR; do
    find /u/$DIR -type f -ctime +30 -print -exec rm -fv {} \;
done

# MANTER ARQUIVOS SOMENTE DOS ULTIMOS 45 DIAS
find /u/arqh -name '*.csv' -type f -ctime +45 -print -exec rm -fv {} \;
}

# CAPTURA OS DIRETORIOS DO "/u/rede/nfe" NECESSARIOS AO BACKUP
capturaDirsNfe(){
    NFE="rede/xml/bck-xml"
    cd /u/rede/nfe 
    for dir in $(find $(ls -1 | grep [0-9]) -type d -name '*bck*'); do 
        NFE="$NFE rede/nfe/$dir"
    done
}
capturaDirsNfe

# COMPACTA O DIRETORIO
Backup(){
    ARQOUT="$DIROUT/$DIRIN/$(echo $DIRIN | awk -F'/' '{print $NF}').rar"
    if [ -d "/u/$DIRIN" ]; then
        cd "/u/$DIRIN"
        mkdir -p $DIROUT/$DIRIN
        rm -fv *.rar
        rar a -y -v1000000 -r "$ARQOUT"
    else
        echo "DIRETORIO /u/$DIRIN NAO EXISTE!"
    fi
}


## VARIAVEIS ##
DIROUT="/u/rede/backs/back-$(date +%y%m%d)"
LOG="$DIROUT/BACK-CRON.LOG"
SIST="sist/arq sist/arqa sist/arqb sist/arqc sist/arqd sist/arqf sist/arqi sist/arqm sist/arqo sist/arqp sist/arqpd sist/arqt sist/arqu sist/arqv sist/arqx sist/bd sist/ctb sist/estd sist/sped sist/wms sist/paf sist/arqq"
BACKS="arq arqa arqh arqp bats ccf $SIST $NFE"

## SEQUENCIA DE EXECUCAO ##
mkdir -p $DIROUT
echo "Backup iniciado em: $(date)" > $LOG
    limpa >> $LOG
    for DIRIN in $BACKS; do
        Backup >> $LOG
    done
echo "Backup Finalizado em: $(date)" >> $LOG
unix2dos $LOG
chmod 777 $LOG