#!/bin/bash
. /etc/bash.bashrc
cat /dev/null > /var/log/apache2/access.log
sleep 2
cat /dev/null > /var/log/auth.log
