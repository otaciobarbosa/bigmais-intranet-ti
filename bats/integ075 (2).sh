#!/bin/bash
source /etc/profile
source $HOME/.bashrc
umask 000
testa=`ps ax | grep rts32 | grep -c integ075`
LOG="/u/log-backup/INTEG075.LOG"

if [ $testa = 0 ]; then
    echo "Inicio: $(date)" > $LOG
    cd /u/sist/exec
    nohup cobrun integ075 >> $LOG
    echo "Fim: $(date)" >> $LOG
fi
