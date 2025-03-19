source /etc/profile

export COBPATH=/u/sist/tmp

testa=`ps ax | grep node | grep -c rgxws.js`

if [ $testa = 0 ]
then
cd /u/rgxws/server/
../node/bin/node --max-old-space-size=5120 rgxws.js
fi

