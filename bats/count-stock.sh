#!/bin/bash
. /etc/bash.bashrc
cd /var/www/node-apps/api-count-stock/
	pm2 start server.js &
	sleep 3
	pm2 start server.js &

