#!/bin/bash

. /etc/bash.bashrc
. /u/login/cpd/.bashrc

PATH=$PATH:/u/cobol/bin:/u/bats:
COBDIR=/u/cobol
COBSW=+R+Q
COBCPY=/u/fontes/cpys
COBTERMINFO=/u/cobol/terminfo
COBPATH=/u/sist/tmp
export LD_LIBRARY_PATH=$COBDIR/lib:/usr/lib/java/jre/lib/i386/server/:$LD_LIBRAR
export COBDIR COBPATH COBSW COBCPY COBTERMINFO PATH LD_LIBRARY_PATH

testa=`ps ax | grep node | grep -c rgxws.js`

if [ $testa = 0 ]
then
	cd /u/rgxws/server/
	node --max-old-space-size=5120 rgxws.js
fi

