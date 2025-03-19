#!/bin/bash
cd /var/www/node-apps/bigmais-gestao-ifood/backend
pm2 start npm --name "API - Gestao Ifood" -- start

cd /var/www/node-apps/bigmais-gestao-ifood/frontend
pm2 start npm --name "APP - Gestao Ifood" -- start
