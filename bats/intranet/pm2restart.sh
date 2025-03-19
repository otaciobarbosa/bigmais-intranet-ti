#!/bin/bash
pm2 del all

cd /var/www/node-apps/bigmais-countstock/backend
pm2 start npm --name "APP - Controle de Validade" -- start

cd /var/www/node-apps/bigmais-gestao-glpi/backend
pm2 start npm --name "API - Gestao GLPI" -- start

cd /var/www/node-apps/bigmais-gestao-gourmet/backend
pm2 start npm --name "API - Gestao Goumert" -- start

cd /var/www/node-apps/bigmais-gestao-ifood/backend
pm2 start npm --name "API - Gestao Ifood" -- start

cd /var/www/node-apps/bigmais-gestao-ifood/frontend
pm2 start npm --name "APP - Gestao Ifood" -- start

cd /var/www/node-apps/bigmais-movimento-entre-locais/backend
pm2 start npm --name "API - Movimento Entre Locais" -- start

cd /var/www/node-apps/bigmais-receita-rendimento/backend
pm2 start npm --name "API - Receita Rendimento" -- start

cd /var/www/node-apps/bigmais-gestao-operacional/backend
pm2 start npm --name "API - Gestão Operacional" -- start

cd /var/www/node-apps/bigmais-gestao-operacional/frontend
pm2 start npm --name "APP - Gestão Operacional" -- start

cd /var/www/node-apps/bigmais-solides-rm/frontend
pm2 start npm --name "APP - Gestão RH" -- start

cd /var/www/node-apps/bigmais-solides-rm/backend
pm2 start npm --name "API - Gestão RH" -- start


pm2 save

pm2 status