#!/bin/sh
###############################################################
# DATA: 01/10/2019 
#
# CRIACAO DA PASTA SAT-NFCE DENTRO DO RETAG
###############################################################


cd /u/bats
data=`date +%Y%m%d`

cd /u/rede/RETAG/${data}

mkdir -p "SAT-NFCE"

chmod 777 SAT-NFCE -R 
