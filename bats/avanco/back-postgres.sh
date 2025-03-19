#!/bin/bash

. /etc/bash.bashrc

DATA=`date +%y%m%d`
DIR="/u/rede/backs/back-$DATA"
BDS="bd_supervisor extrato"

mkdir -p "$DIR/postgres"

for BANCO in $BDS; do
	/usr/bin/pg_dump -FC -U postgres -f "$DIR/postgres/$BANCO-$DATA.backup" "$BANCO"
done

chmod -R 777 "$DIR"
chown -R avanco.sist "$DIR"
