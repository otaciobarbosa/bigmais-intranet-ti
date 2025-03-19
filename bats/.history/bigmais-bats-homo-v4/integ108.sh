#!/bin/bash
. /etc/bash.bashrc
umask 000
testa=`ps ax | grep rts32 | grep -c integ108`
LOG="/u/log-backup/INTEG108.LOG"

if [ $testa = 0 ]; then
    echo "Inicio: $(date)" > $LOG
    cd /u/sistema/bigmais/sist/exec
    cobrun integ108 >> $LOG
    echo "Fim: $(date)" >> $LOG
fi
mv /u/rede/integral/sitemercado/smitens??.csv /var/www/html/vipcommerce/csv/
cd /var/www/html/vipcommerce/
php index.php