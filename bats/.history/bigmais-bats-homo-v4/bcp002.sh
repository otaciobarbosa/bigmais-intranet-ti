#!/bin/bash

# SCRIPT PARA EXECUCAO DE ROTINA
# DE CARGA AUTOMATICA BANCO POSTGRESQL LOCAL

. /etc/bash.bashrc
umask 000

TESTA=`ps ax | grep rts32 | grep -c bcp002`
LOG="/u/log-backup/BCP002.LOG"

cd /u/sist/exec

if [ $TESTA = 0 ]; then
    echo "Inicio: $(date)" > $LOG
    nohup cobrun bcp002 >> $LOG
    echo "Fim:    $(date)" >> $LOG
else
    echo "Rotina ja em execucao!" >> $LOG
fi
