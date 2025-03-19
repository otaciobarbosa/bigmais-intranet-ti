#!/bin/bash

source /etc/profile
umask 000
LOG="/u/log-backup/VERSAOPDV.LOG"

cd /u/sist/exec
echo "Inicio: $(date)" > $LOG
cobrun versaopdv
echo "Fim:    $(date)" >> $LOG
exit
