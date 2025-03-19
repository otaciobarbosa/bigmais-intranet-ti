#!/bin/sh
#
COMANDO=`type lsof | awk '{print $3}'`
while [ 1 ]; do
        $COMANDO -c rts32 | grep -E 'arq|arqa|arqh|arqb|arqc|arqd|arqe|arqf|arqi|arqm|arqo|arqp|arqpd|arqx|arqe|wms|sped|ctb|paf' | awk '{print $3 FS $9}' | sort > /tmp/.arquivos-abertos-integral
        conta=1
        for file in `ps aux | grep cobol | awk '{print $1}'`; do
                usuario=$file
                if [ $usuario != root ]; then
                        if let $file 2>/dev/null; then
                                usuario=`cat /etc/passwd | grep ":$file:" | awk -F: '{print $1}'`
                        fi
                        if [ $conta = 1 ]; then
                                w -h "$usuario" | awk '{print $1 FS $3}' | uniq > /tmp/.usuarios-abertos-integral.tmp
                        else
                                w -h "$usuario" | awk '{print $1 FS $3}' | uniq >> /tmp/.usuarios-abertos-integral.tmp
                        fi
                fi
                conta=`expr $conta + 1`
        done
        cat /tmp/.usuarios-abertos-integral.tmp | sort | uniq > /tmp/.usuarios-abertos-integral
        sleep 10
done

