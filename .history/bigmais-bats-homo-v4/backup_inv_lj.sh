stty -isig

cd /u/sistema/bigmais/sist/arqpd

clear
echo " Informe a data (DDMMAA) do Inventario e Tecle ENTER: "
echo ""
read data

mkdir -p /u/rede/bck-inv/$data

cp ../arqpd/ivl??$data     /u/rede/bck-inv/$data
cp ../arqpd/ivl??$data.idx /u/rede/bck-inv/$data

cp ../arqpd/iv??$data      /u/rede/bck-inv/$data
cp ../arqpd/iv??$data.idx  /u/rede/bck-inv/$data


if [ $? != 1 ]
   then
      echo ""
      echo " Backup realizado com SUCESSO !!! Tecle <Enter> !"
      echo ""
      read tecla
      exit 0
fi
               
echo ""
echo " Ocorreu ERRO. Copia nao realizada !!! Tecle <Enter> !"
echo ""
read tecla
                                                