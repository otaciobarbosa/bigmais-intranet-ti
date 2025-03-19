inotifywait -m /u/rede/RETAG -e create  -e moved_to |
   while read path action file; do
        if [[ "$file" =~ cliente.txt$ ]]; then
            echo  "codigo;cpf;inscricao;nome;endereco;bairro;cep;cidade;estado;telefone" > novo_cliente.csv
            sleep 3
            cd /u/rede/RETAG
            cat cliente.txt |cut -c2-8,10-21,22-35,36-70,71-105,106-125,126-133,134-153,154-155,156-167  --output-delimite=';' >>  novo_cliente.csv
            mount 192.168.0.210:/var/www/html/intra/sistemas/tv/importa /mnt/
            cp novo_cliente.csv /mnt
            umount /mnt
        fi
    done
