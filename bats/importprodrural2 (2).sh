cat prodrural0$1.csv |sed 's/ ;/;/g'|sed 's/; /;/' |sed 's/;;//g'|sed 's/; /;/g'|awk -F";" '{printf "%1s %7s  %18s  %52s        %-47s %212s  \n", $1, $2, $3, $4, $5, $6 }' > 060913prod0$1.txt
