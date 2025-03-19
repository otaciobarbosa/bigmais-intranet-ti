#!/bin/bash

. /etc/bash.bashrc
umask 000
export COBPATH=/u/sist/tmp

testa=`ps ax | grep node | grep -c integweb.js`

if [ $testa = 0 ]; then
    cd /u/integweb/server/
    ../node/bin/node --max-old-space-size=5120 integweb.js
fi
