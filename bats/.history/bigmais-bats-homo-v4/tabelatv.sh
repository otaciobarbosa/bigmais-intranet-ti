inotifywait -m /u/rede/RETAG/mgv4 -e create  -e moved_to |
   while read path action file; do
        if [[ "$file" =~ ITENSMGV.txt$ ]]; then 
            echo "Arquivo alterado"  $(date) >> /var/log/tabelatv.log 
            sleep 3
            cd /u/rede/RETAG/mgv4
            cat ITENSMGV.txt |cut -c5-9,11-15,19-45 --output-delimite=";" > carga.csv
            scp carga.csv root@192.168.0.210:/var/www/html/intra/sistemas/tv/importa
        fi
    done
