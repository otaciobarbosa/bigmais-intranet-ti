#!/bin/bash

filiais="01 05"

for num in $(echo $filiais)
do
    testa=`ps ax | grep -v 'grep' | grep -c Integpaf$num.jar`
	if [ $testa = 0 ]; then
	    cd /u/rede/PAF/$num/integrador
	    java -jar Integpaf$num.jar &
	fi
done
