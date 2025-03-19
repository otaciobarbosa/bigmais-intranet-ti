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

rm /u/sistema/bigmais/arq/sp02a59*
cd /u/sistema/bigmais/sist/exec
cobrun integ019
