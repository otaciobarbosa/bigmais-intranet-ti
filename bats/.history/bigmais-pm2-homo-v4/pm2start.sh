#!/bin/bash
cd /var/www/node-apps/bigmais-countstock/backend
pm2 start npm --name "APP - Controle de Validade" -- start

cd /var/www/node-apps/bigmais-gestao-comercial/backend
pm2 start npm --name "API - Gestao Comercial" -- start

cd /var/www/node-apps/bigmais-gestao-comercial/frontend
pm2 start npm --name "APP - Gestao Comercial" -- start

cd /var/www/node-apps/bigmais-gestao-glpi/backend
pm2 start npm --name "API - Gestao GLPI" -- start

cd /var/www/node-apps/bigmais-gestao-gourmet/backend
pm2 start npm --name "API - Gestao Goumert" -- start

cd /var/www/node-apps/bigmais-gestao-ifood/backend
pm2 start npm --name "API - Gestao Ifood" -- start

cd /var/www/node-apps/bigmais-gestao-ifood/crontab
pm2 start npm --name "CRON - Gestao Ifood" -- start

cd /var/www/node-apps/bigmais-gestao-ifood/frontend
pm2 start npm --name "APP - Gestao Ifood" -- start

cd /var/www/node-apps/bigmais-movimento-entre-locais/backend
pm2 start npm --name "API - Movimento Entre Locais" -- start

cd /var/www/node-apps/bigmais-receita-rendimento/backend
pm2 start npm --name "API - Receita Rendimento" -- start

pm2 save