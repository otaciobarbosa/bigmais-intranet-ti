#!/bin/bash

. /etc/bash.bashrc
. /u/login/cpd/.bashrc

testa=`ps ax | grep node | grep -c conciliador_nfce.js`

if [ $testa = 0 ]
then
	cd /u/regex/conciliador_nfce/server/
	node --max-old-space-size=5120 conciliador_nfce.js
fi
