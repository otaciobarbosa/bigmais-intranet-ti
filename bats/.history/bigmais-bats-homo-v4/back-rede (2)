#!/bin/bash

source /etc/profile
umask 000

testes() {

testaonline1=`ps ax | grep -c integ034`
testaonline2=`ps ax | grep -c integ035`

if [ $testaonline1 -gt 1 ]; then
    clear
    tput cup 10 18; tput smso; echo "                                            "; tput rmso
    tput cup 11 18; tput smso; echo " A ROTINA ONLINE ESTA ATIVA, PARA INICIAR O "; tput rmso
    tput cup 12 18; tput smso; echo "     BACKUP E' NECESSARIO DESATIVA-LA!      "; tput rmso
    tput cup 13 18; tput smso; echo "                                            "; tput rmso
    sleep 5
    exit
fi

if [ $testaonline2 -gt 1 ]; then
    clear
    tput cup 10 18; tput smso; echo "                                            "; tput rmso
    tput cup 11 18; tput smso; echo " A ROTINA ONLINE ESTA ATIVA, PARA INICIAR O "; tput rmso
    tput cup 12 18; tput smso; echo "     BACKUP E' NECESSARIO DESATIVA-LA!      "; tput rmso
    tput cup 13 18; tput smso; echo "                                            "; tput rmso
    sleep 5
    exit
fi
}

inicio() {

while
    clear
    tput cup 9 12; tput smso; echo "                                                        "; tput rmso
    tput cup 10 12; tput smso; echo " INICIAR A ROTINA DE BACKUP MANUAL DO SISTEMA INTEGRAL? "; tput rmso
    tput cup 11 12; tput smso; echo "                                                        "; tput rmso
    tput cup 13 34; echo -n "S ou N => "
do
    read opcao
    case $opcao in
	S|s) back; break;;
	
	N|n) clear
	     tput cup 10 20; tput smso; echo "                                         "; tput rmso
	     tput cup 11 20; tput smso; echo " A ROTINA DE BACKUP MANUAL FOI ABORTADA! "; tput rmso
	     tput cup 12 20; tput smso; echo "                                         "; tput rmso
	     sleep 3
	     exit;;
    esac
done
}

back() {

DIROUT="/u/rede/backs/back-$(date +%y%m%d)"

if [ -d "$DIROUT" ]; then
    while
    clear
    tput cup 9 16; tput smso; echo "                                                 "; tput rmso
    tput cup 10 16; tput smso; echo " JA EXISTE O DIRETORIO DE BACKUP DE HOJE, DESEJA "; tput rmso
    tput cup 11 16; tput smso; echo "       REMOVE-LO E CRIAR UM MAIS RECENTE?        "; tput rmso
    tput cup 12 16; tput smso; echo "                                                 "; tput rmso
    tput cup 14 34; echo -n "S ou N => "
    do
	read faz
	case $faz in
	    S|s) clear
		 tput cup 10 22; tput smso; echo "                                     "; tput rmso
		 tput cup 11 22; tput smso; echo " REMOVENDO BACKUP ANTIGO, AGUARDE... "; tput rmso
		 tput cup 12 22; tput smso; echo "                                     "; tput rmso
		 rm -rf "$DIROUT"
		 break;;

	    N|n) clear
	         tput cup 10 20; tput smso; echo "                                         "; tput rmso
	         tput cup 11 20; tput smso; echo " A ROTINA DE BACKUP MANUAL FOI ABORTADA! "; tput rmso
	         tput cup 12 20; tput smso; echo "                                         "; tput rmso
	         sleep 3
	         exit;;
	esac
    done
fi

testausers=`ps ax | grep -c rts32`

if [ $testausers -gt 1 ]; then
    while
    clear
    tput cup 5 14;  tput smso; echo "                                                     "; tput rmso
    tput cup 6 14;  tput smso; echo " EXISTEM USUARIOS UTILIZANDO O SISTEMA, PARA INICIAR "; tput rmso
    tput cup 7 14;  tput smso; echo "      O BACKUP SERA' NECESSARIO DESCONECTA-LOS!      "; tput rmso
    tput cup 8 14;  tput smso; echo "                                                     "; tput rmso
    tput cup 19 19; tput smso; echo "                                           "; tput rmso
    tput cup 20 19; tput smso; echo "             O SISTEMA FICARA' INACESSIVEL "; tput rmso
    tput cup 20 20; echo "IMPORTANTE:"
    tput cup 21 19; tput smso; echo "     DURANTE TODO O PROCESSO DO BACKUP.    "; tput rmso
    tput cup 22 19; tput smso; echo "                                           "; tput rmso
    tput cup 11 29; echo "DESEJA DESCONECTA-LOS?"
    tput cup 12 34; echo -n "S ou N => "

    do
	read desc
	case $desc in
	    S|s) clear
		 killall rts32 > /dev/null 2>&1
		 mv /u/sist/exec/integral.gnt /u/sist/exec/thiago.gnt > /dev/null 2>&1
		 tput cup 11 28; tput smso; echo "                         "; tput rmso
		 tput cup 12 28; tput smso; echo " USUARIOS DESCONECTADOS! "; tput rmso
		 tput cup 13 28; tput smso; echo "                         "; tput rmso
		 sleep 3
		 break;;

	    N|n) clear
	         tput cup 10 20; tput smso; echo "                                         "
	         tput cup 11 20; tput smso; echo " A ROTINA DE BACKUP MANUAL FOI ABORTADA! "
	         tput cup 12 20; tput smso; echo "                                         "
	         sleep 3
	         exit;;
	esac
    done
fi

capturaDirsNfe(){
NFE="rede/xml/bck-xml"
cd /u/rede/nfe
for dir in $(find $(ls -1 | grep [0-9]) -type d -name '*bck*'); do 
    NFE="$NFE rede/nfe/$dir"
done
}
capturaDirsNfe

DIROUT="/u/rede/backs/back-$(date +%y%m%d)"
LOG="$DIROUT/BACK-CRON.LOG"
SIST="sist/arq sist/arqa sist/arqb sist/arqc sist/arqd sist/arqf sist/arqi sist/arqm sist/arqo sist/arqp sist/arqpd sist/arqt sist/arqu sist/arqv sist/arqx sist/bd sist/ctb sist/estd sist/sped sist/wms sist/paf sist/arqq"
BACKS="arq arqa arqh arqp bats ccf $SIST $NFE"

Backup(){
ARQOUT="$DIROUT/$DIRIN/$(echo $DIRIN | awk -F'/' '{print $NF}').rar"
if [ -d "/u/$DIRIN" ]; then
    cd "/u/$DIRIN"
    mkdir -p $DIROUT/$DIRIN
    rm -fv *.rar
    rar a -y -v1000000 -r "$ARQOUT"
else
    echo "DIRETORIO /u/$DIRIN NAO EXISTE!" >> $LOG
fi
}

mkdir -p $DIROUT
echo "Backup Manual iniciado em: $(date)" > $LOG
for DIRIN in $BACKS; do
    Backup
done
echo "Backup Manual Finalizado em: $(date)" >> $LOG
unix2dos $LOG
chmod 777 $LOG

clear
tput cup 8 30; tput smso; echo "                    "; tput rmso
tput cup 9 30; tput smso; echo " BACKUP FINALIZADO! "; tput rmso
tput cup 10 30; tput smso; echo "                    "; tput rmso

tput cup 18 21; tput smso; echo "                                          "; tput rmso
tput cup 19 21; tput smso; echo "                                          "; tput rmso
tput cup 20 21; tput smso; echo "                                          "; tput rmso
tput cup 19 22; echo "NAO ESQUECA DE REATIVAR A ROTINA ONLINE!"
tput cup 13 24; echo -n "Pressione [Enter] para Finalizar."
read x
}

fim() {
if [ -e /u/sist/exec/thiago.gnt ]; then
    mv /u/sist/exec/thiago.gnt /u/sist/exec/integral.gnt
    exit
fi
}

# SEQUENCIA FUNCOES SCRIPT
testes
inicio
fim