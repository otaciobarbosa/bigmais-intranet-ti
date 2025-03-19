#!/bin/bash
. /etc/bash.bashrc
umask 000
testa=`ps ax |  grep -c cargac.sh`
LOG="/u/log-backup/CARGACLIENTES.LOG"

 inotifywait -m /u/rede/RETAG -e create  -e moved_to |
  while read path action file; do
   if [[ "$file" =~ cliente.txt$ ]]; then
    echo  "codigo;cpf;inscricao;nome;endereco;bairro;cep;cidade;estado;telefone" > novo_cliente.csv
    cd /u/rede/RETAG
    cat cliente.txt |cut -c2-8,10-21,22-35,36-70,71-105,106-125,126-133,134-153,154-155,156-167  --output-delimite=';' >>  novo_cliente.csv
    sudo scp novo_cliente.csv root@192.168.0.210:/var/www/html/intra/imp/
   fi
  done
  echo "Fim: $(date)" >> $LOG
