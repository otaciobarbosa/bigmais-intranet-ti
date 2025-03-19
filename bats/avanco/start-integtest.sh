source /etc/profile

export COBPATH=/u/sist/tmp


cd /u/integtest/server/
../node/bin/node --max-old-space-size=5000  integweb.js

