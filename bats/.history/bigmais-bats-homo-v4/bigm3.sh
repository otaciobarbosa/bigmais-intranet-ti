ix=`date +%A`
rm -rf /u/rede/backs/ix$ix
mkdir /u/rede/backs/ix$ix
cd /u/rede/IXFOLHA
rar a -y -r -inul /u/rede/backs/ix$ix/IXFOLHA
cd /u/rede/IXCONT
rar a -y -r -inul /u/rede/backs/ix$ix/IXCONT
cd /u/rede/backs
chmod 777 -R ix$ix