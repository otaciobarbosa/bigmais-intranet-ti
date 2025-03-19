#!/bin/bash
source /etc/profile
umask 000
 
testa=`ps ax | grep -v 'grep' | grep -c 'node index.js'`
 
if [ $testa = 0 ]; then
   cd /u/agente-gda
   ../node-v0.12.2/bin/node index.js
fi
