#!/bin/sh

## TESTA SE O DIRETÓRIO JÁ EXISTE
if [ ! -x /u/log-backup/disco2 ]; then
    mkdir -p /u/log-backup/disco2
fi


## TESTA SE O SCRIPT JA ESTA ATIVO E CASO NAO, ATIVA.

find /u/log-backup/disco2/ -type f -ctime +7 -print -exec rm -f {} \;

## CRIA LOG DE TEMPO GASTO DA SINCRONIZACAO

LOG="/u/log-backup/disco2/DISCO2-$(date +%d.%m.%Y).LOG"

## SINCRONIZACAO:
if df | grep disco2; then

## /u
rsync -arptvxE --delete /u/ /mnt/disco2/u/ >> $LOG

## USUARIOS E SENHAS
rsync -aptv /etc/passwd /mnt/disco2/linux/etc/passwd >> $LOG
rsync -aptv /etc/shadow /mnt/disco2/linux/etc/shadow >> $LOG

## REDE
rsync -aptv /etc/rc.d/rc.inet1.conf /mnt/disco2/linux/etc/rc.d/rc.inet1.conf >> $LOG

## INICIALIZACAO
rsync -aptv /etc/rc.d/rc.local /mnt/disco2/linux/etc/rc.d/rc.local >> $LOG

## CRON
rsync -aptv /var/spool/cron/crontabs/root /mnt/disco2/linux/var/spool/cron/crontabs/root >> $LOG
rsync -aptv /var/spool/cron/crontabs/avanco /mnt/disco2/linux/var/spool/cron/crontabs/avanco >> $LOG

## SAMBA E CUPS
rsync -aptv /etc/samba/smb.conf /mnt/disco2/linux/etc/samba/smb.conf >> $LOG
rsync -aptv /etc/cups/printers.conf /mnt/disco2/linux/etc/cups/printers.conf >> $LOG

## FINALIZA LOG

else
    echo "UNIDADE NAO ENCONTRADA!" > $LOG

## FINALIZA SCRIPT
fi
