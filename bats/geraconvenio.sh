cat /u/sistema/bigmais/sist/rel/$1 |grep ","  | \
 grep -v Total| \
 cut -c12-19,21-34,36-67,86-95 --output-delimite=";"| \
 tr -d "."| \
 tr -d "/"| \
 sed s/,/./ | \
 tr -d " "     > convenio.csv

