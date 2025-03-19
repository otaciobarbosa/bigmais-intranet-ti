#!/bin/bash
. /etc/bash.bashrc
umask 000
testa=`ps ax | grep rts32 | grep -c integ038`
LOG="/u/log-backup/INTEG038.LOG"

if [ $testa = 0 ]; then
    echo "Inicio: $(date)" > $LOG
    cd /u/sistema/bigmais/sist/exec
    nohup cobrun integ038 >> $LOG
    echo "Fim: $(date)" >> $LOG
fi
