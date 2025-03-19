#!/bin/sh
path=/u/tomcat/dominio1/webapps/conciliador

if [ ! -f /u/concilia/scripts/desconciliar-venda.sh ]; then
	mv desconciliar-venda.sh /u/concilia/scripts/
fi;

if [ ! -f /u/concilia/scripts/estornar-baixa.sh ]; then
	mv estornar-baixa.sh /u/concilia/scripts/ 
fi;

rm $path/WEB-INF/classes/conciliador-backup -r
mv $path/script/conciliador.js $path/script/conciliador.js.backup
mv conciliador.js $path/script/
mv $path/WEB-INF/classes/conciliador $path/WEB-INF/classes/conciliador-backup
mv conciliador/ $path/WEB-INF/classes/

pg_dump -Upostgres extrato > /u/concilia/backup/backup-3.1.sql
psql -Upostgres -dextrato -f script-3.1.sql

mkdir -p /u/concilia/backup/amex
mkdir -p /u/concilia/backup/banescard
mkdir -p /u/concilia/backup/bin
mkdir -p /u/concilia/backup/boa
mkdir -p /u/concilia/backup/benvisavale
mkdir -p /u/concilia/backup/bigcard
mkdir -p /u/concilia/backup/asmube
mkdir -p /u/concilia/backup/brasilcard
mkdir -p /u/concilia/backup/cabal
mkdir -p /u/concilia/backup/cielo
mkdir -p /u/concilia/backup/comprocard
mkdir -p /u/concilia/backup/consolidar
mkdir -p /u/concilia/backup/dmcard
mkdir -p /u/concilia/backup/ecxcard
mkdir -p /u/concilia/backup/elavon
mkdir -p /u/concilia/backup/getnet
mkdir -p /u/concilia/backup/goodcard
mkdir -p /u/concilia/backup/greencard
mkdir -p /u/concilia/backup/mgcard
mkdir -p /u/concilia/backup/policard
mkdir -p /u/concilia/backup/rede
mkdir -p /u/concilia/backup/safra
mkdir -p /u/concilia/backup/sipag
mkdir -p /u/concilia/backup/sodexo
mkdir -p /u/concilia/backup/ticket
mkdir -p /u/concilia/backup/tricard
mkdir -p /u/concilia/backup/valecard
mkdir -p /u/concilia/backup/verocheque
mkdir -p /u/concilia/backup/vrcard
mkdir -p /u/concilia/backup/vegascard
mkdir -p /u/concilia/backup/ascipam

#chmod 777 /u/concilia/ -R
chmod -R 777 /u/concilia/ && chown -R avanco.sist /u/concilia/
chmod -R 777 $path && chown -R avanco.sist $path

/etc/rc.d/rc.tomcat stop
#/u/bats/tomcat.sh

