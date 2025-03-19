inotifywait -m /u/rede/RETAG/mgv4 -e close_write -e create  |
   while read path action file; do
        if [[ "$file" == ITENSMGV.* ]]; then 
            echo "Arquivo alterado - $file em  "  $(date) >> /var/log/tabelatv.log 
            sleep 1
            cd /u/rede/RETAG/mgv4
	    mount 192.168.0.210:/var/www/html/intra/sistemas/tv/importa /mnt/
            cat $file |cut -c5-9,11-15,19-45 --output-delimite=";" > /mnt/$file
	    umount /mnt
        fi
    done
