mv     /inst/Novo/?0_*   /inst/Novo/comum
mv -v  /inst/Novo/?00_*  /var/www/html/api/bizerba/arquivos/ >> /var/log/bizerbaticket.log
cd /var/www/html/api/bizerba
php index.php

