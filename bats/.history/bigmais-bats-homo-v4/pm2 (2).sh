#!/bin/bash

. /etc/bash.bashrc

umask 000

zeraLogs(){
    > /u/node_apps/carga/carga-nfe.log
    > $HOME/.pm2/logs/carga-error-0.log
    > $HOME/.pm2/logs/carga-out-0.log
}

TESTA=`ps ax | grep -v 'grep' | grep -c 'node_apps'`

if [ $TESTA = 0 ]; then
    . $HOME/.bashrc
    zeraLogs
    cd /u/node_apps
    pm2 start pm2.json
fi
