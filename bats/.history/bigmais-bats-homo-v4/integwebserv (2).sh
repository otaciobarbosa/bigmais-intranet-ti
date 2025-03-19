#!/bin/bash

# SCRIPT PARA EXECUCAO DE ROTINA
# DE CARGA AUTOMATICA CADEIA DE VALOR

. /etc/bash.bashrc
source $HOME/.bashrc
umask 000

TESTA=`ps ax | grep rts32 | grep -c integwebserv`
LOG="/u/log-backup/INTEGWEBSERV.LOG"

cd /u/sist/exec

if [ $TESTA = 0 ]; then
    echo "Inicio: $(date)" > $LOG
    cobrun integwebserv >> $LOG
    echo "Fim:    $(date)" >> $LOG
else
    echo "Rotina ja em execucao!" >> $LOG
fi
