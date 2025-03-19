#!/bin/sh
echo CUPOM:
read CUPOM

echo CPF:
read CPF

rar a BKP_CUPOM.rar $CUPOM

ANTIGA=`cat $CUPOM |grep CONVENIO  | sort -n -k4 | awk '{print $4}'`
NOVA=`cat $CUPOM |grep CONVENIO  | sort -n -k4 | awk '{print $4}' | cut -c1-20 |sed 's/$/'$CPF'/'`

sed -i 's/'$ANTIGA'/'$NOVA'/' $CUPOM

echo "---------------------------"
echo "CUPOM    : $CUPOM"
echo "CPF      : $CPF"
echo "STRING A : $ANTIGA"
echo "STRING B : $NOVA"
echo "---------------------------"

