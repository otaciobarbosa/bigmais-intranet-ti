source /etc/profile

export COBPATH=/u/sist/tmp

testa=`ps ax | grep node | grep -c integweb.js`

if [ $testa = 0 ]
then
cd /u/integweb/server/
/u/integweb/node/bin/node --max-old-space-size=5120 integweb.js
fi

