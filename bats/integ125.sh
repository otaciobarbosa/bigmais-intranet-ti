############################
# Servico Sistema Integral #
############################

COBPATH=/u/sist/exec
COBDIR=/u/cobol
COBTERMINFO=$COBDIR/terminfo
COBSW=+R+Q
LD_LIBRARY_PATH=$COBDIR/lib:/usr/lib/java/jre/lib/i386/server/
PATH=$PATH:$COBDIR/bin:/u/bats
TERM=ansi
export COBPATH COBDIR COBTERMINFO COBSW LD_LIBRARY_PATH PATH TERM
umask 000

### Variaveis
datadia=`date +%y%m%d`
#### Gera LOG
#geralog() {
#    cd /u/log-integsitemercado
#    arq_usu="log-integ125-"`date +%d%m%y`
#    echo "#------------------------#" >> $arq_usu
#    echo "#  INTEGRAL " `date +%d%m%y` "#">> $arq_usu
#    echo "#  HORA DO INTEG125: " `date +%H%M%S`"#">> $arq_usu
#    echo "#------------------------#" >> $arq_usu
#}

#Rotina de geracao de carga de preco total Super Luna
cd /u/sist/exec/
cobrun integ125

sleep 5

#cd /u/rede/integral/sitemercado/
#chmod 777 smitens*

# Gera Log do INTEG104
#geralog
