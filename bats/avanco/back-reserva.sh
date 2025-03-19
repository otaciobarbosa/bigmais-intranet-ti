#!/bin/bash

# CRIE O ARQUIVO /u/bats/lista CONTENDO OS DIRETORIOS DO /u QUE DEVERAO SER COPIADOS
# OBS: O CONTEUDO DA LISTA NAO PODE CONTER OS CARACTERES \ E /

# CARREGA VARIAVEIS DE AMBIENTE
. /etc/bash.bashrc
SERVIDOR='192.168.0.101'
PORTA='5522'
LOGDIR='/u/log-backup/reserva'
LISTA='/u/bats/lista'
DATA=`date +%d.%m.%Y`

VerificaStatus() {
status=`ps ax | grep -v 'grep' | grep -c 'rsync'`
if [ $status != 0 ]; then
    echo "Sincronia nao executada!" > $LOGDIR/reserva-$DATA.log
    echo "Rotina ja' esta' em execucao." >> $LOGDIR/reserva-$DATA.log
    exit
fi
}

LimpaLogAntigos(){
find $LOGDIR -type f -ctime +3 -print -exec rm -f {} \;
}

FinalizaProcessos(){
mv /u/bats/online.sh /u/bats/old.online.sh
mv /u/bats/conv-xml.sh /u/bats/old.conv-xml.sh
mv /u/bats/carganfe.sh /u/bats/old.carganfe.sh
mv /u/bats/integ019.sh /u/bats/old.integ019.sh
sh /etc/rc.d/rc.postgresql stop
for proccarganfe in $(ps ax | grep -v 'grep' | grep node | cut -b 1-5); do
    kill -9 $proccarganfe
done
killall java
killall rts32
}

CopiaDados(){
if [ ! -d $LOGDIR ]; then
    mkdir $LOGDIR
    chmod -R 777 $LOGDIR
fi

if [ -e $LISTA ]; then
    for DIR in $(cat $LISTA); do
	date > $LOGDIR/$DIR-$DATA.log
	rsync -arptvxE --delete --rsh="ssh -p$PORTA" /u/"$DIR"/ root@"$SERVIDOR":/u/"$DIR"/ >> $LOGDIR/$DIR-$DATA.log
	date >> $LOGDIR/$DIR-$DATA.log
    done
    rsync -aptv --rsh="ssh -p$PORTA" /etc/passwd root@"$SERVIDOR":/etc/passwd >> $LOGDIR/passwd-$DATA.log
    rsync -aptv --rsh="ssh -p$PORTA" /etc/shadow root@"$SERVIDOR":/etc/shadow >> $LOGDIR/shadow-$DATA.log
else
    date > /u/log-backups/reserva/reserva.log
    echo "LISTA DE DIRETORIOS A COPIAR NAO ECONTRADO" >> /u/log-backups/reserva/reserva.log
fi
}

IniciaProcessos(){
mv /u/bats/old.integ019.sh /u/bats/integ019.sh
sudo -u avanco sh /u/bats/integ019.sh &
mv /u/bats/old.online.sh /u/bats/online.sh
mv /u/bats/old.conv-xml.sh /u/bats/conv-xml.sh
mv /u/bats/old.carganfe.sh /u/bats/carganfe.sh
sh /etc/rc.d/rc.postgresql start
}

VerificaStatus
LimpaLogAntigos
FinalizaProcessos
CopiaDados
IniciaProcessos
