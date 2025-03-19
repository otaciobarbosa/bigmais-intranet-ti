inotifywait  -m /var/www/html/intra/sistemas/tv/importa -e create -e close_write  -e moved_to |
   while read path action file; do
        if [[ "$file" == ITENSMGV.* ]]; then
            echo "Arquivo alterado $FILE em "  $(date) >> /var/log/tabelatv.log
            sleep 3
            cd /var/www/html/intra/sistemas/tv
	    ./autoimporta.php
	fi
   done
