#!/bin/sh

for i in `ls /u/rede/RETAG/$1/`
do
	data=`cat /u/rede/RETAG/$1/$i | grep -c $2`
	if [ $data != 0 ] 
	then
		echo /u/rede/RETAG/$1/$i
	fi
done
