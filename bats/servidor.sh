SERVIDOR=`df -h`
mysql --host=192.168.0.210 --user=root --password=bigmais.123 bigmais_admin 2> /dev/null << EOF
UPDATE controle SET controle_descricao='$SERVIDOR', controle_log = NOW() WHERE controle_loja ='210';
EOF
