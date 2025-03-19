#! /bin/bash
#
# Rotina de backup dos arquivos de configuracao do Sistema Operacional
# Base: SuSE Linux 9.x
#
#
D_DIR=/u/sysbkp

if [ ! -d ${D_DIR}/etc ]
   then
   mkdir ${D_DIR}/etc
fi
 
cp /etc/passwd /etc/group /etc/shadow /etc/profile /etc/profile.local \
   /etc/hosts  /etc/rsyncd.conf  /etc/xinetd.conf ${D_DIR}/etc

cp -r /etc/cups       ${D_DIR}/etc
cp -r /etc/samba      ${D_DIR}/etc
cp -r /etc/init.d     ${D_DIR}/etc
cp -r /etc/xinetd.d   ${D_DIR}/etc
cp -r /etc/sysconfig  ${D_DIR}/etc


if [ ! -d ${D_DIR}/home ]
   then
   mkdir ${D_DIR}/home
fi
 
cp -r /home      ${D_DIR}/home
