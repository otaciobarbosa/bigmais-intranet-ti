#mail alex
PATH=$PATH:/u/cpd:/u/bin:/u/cobol/bin:/u/bats:/u/sist/exec
COBDIR=/u/cobol
COBPATH=/u/sist/exec
COBSW=-iF
COBCPY=/u/fontes/cpys
COBTERMINFO=/u/cobol/terminfo
LD_LIBRARY_PATH=$COBDIR/coblib:/usr/java/jre1.7.0_10/lib/i386/server/:$LD_LIBRARY_PATH
TERM=ansi
export COBDIR COBPATH COBSW COBCPY COBTERMINFO PATH LD_LIBRARY_PATH TERM
cd /u/sistema/bigmais/sist/exec
cobrun integ019
chmod 777 /u/sistema/bigmais/sist/arq/sp02a59*
chmod 777 /u/sistema/bigmais/sist/estd/*
chmod 777 /tmp/ut*
chmod 777 /u/sistema/bigmais/sist/arqv/vi*
