#!/bin/bash

. /etc/bash.bashrc
umask 000

testa=`ps ax | grep node | grep -c node`

if [ $testa != 10 ]; then
    cd /var/www/node-apps/api-mov-entre-locais/
    npm start &

    sleep 3

    cd /var/www/node-apps/app-folheto-ofertas/app-folheto-ofertas
    npm start &

    sleep 3

    cd /var/www/node-apps/app-folheto-ofertas/api-folheto-ofertas
    npm start &

   sleep 3

    cd /var/www/node-apps/api-count-stock/
    pm2 start server.js &

fi
