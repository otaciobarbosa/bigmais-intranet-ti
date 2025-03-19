find /u/sist/n		-type f -ctime +30 -print -exec rm -f {} \;
find /u/sist/e		-type f -ctime +30 -print -exec rm -f {} \;
find /u/sist/o		-type f -ctime +30 -print -exec rm -f {} \;
find /u/sist/rel	-type f -ctime +30 -print -exec rm -f {} \;
find /u/sist/arqe	-type f -ctime +30 -print -exec rm -f {} \;
find /u/arq/h	-name '*.csv' -type f -ctime +365 -print -exec rm -f {} \;
