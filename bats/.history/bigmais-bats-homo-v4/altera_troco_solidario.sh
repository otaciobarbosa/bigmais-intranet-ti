quit=n 
while [  "$quit"   =   "n"  ] 
do 
clear 
echo 
echo "1. Atualizacao Troco Solidario" 
echo "" 
echo "9. Sair" 
echo 
echo "Escolha uma opcao:" 
read opcao 
case $opcao in 

1)
echo "Final IP [ loja/pdv ]: ( exemplo: 2.10 )"
read ip 
ssh root@192.168.$ip "sed -i 's,FUND. CASA DA MENINA STA BERNADETE,INSTITUTO NOSSO LAR,g' /var/venditor/PRM/TICKET.xml"
;;

9) quit=y;; 
*) echo "Tente Novamente ..." 
sleep 1 

esac 

done 
echo "Obrigado !"