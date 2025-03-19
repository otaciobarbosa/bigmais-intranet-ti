#!/bin/bash

source /etc/profile
JAVA_HOME=/usr/lib/java
CATALINA_BASE=/u/tomcat/dominio1
CATALINA_OPTS="-server -Xmx1024m"
#PATH=%PATH:/usr/lib/java/bin
export JAVA_HOME CATALINA_BASE CATALINA_OPTS

testa=`ps ax | grep java | grep -c tomcat`

if [ $testa = 0 ] 
then
	/etc/rc.d/rc.tomcat start
fi

/u/login/cpd/.nvm/versions/node/v7.10.0/bin/node /u/regex/rgx-van/wget.js
