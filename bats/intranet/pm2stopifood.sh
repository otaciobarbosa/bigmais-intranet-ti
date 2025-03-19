/usr/bin/pm2 del  `(pm2 status  | grep "Ifood" | cut -c 39-41)`
