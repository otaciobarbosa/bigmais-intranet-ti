#!/bin/bash
for i in find /u/rede -name *.eml
do
echo "Busca e exclusao iniciadas"
rm -rf $i
echo "exclusao finalizada!"
done
