#!/bin/bash

. /etc/bash.bashrc
umask 000
JAVA_HOME=/usr/lib/java
CATALINA_BASE=/u/tomcat/dominio1
CATALINA_OPTS="-server -Xmx1024m"
#PATH=%PATH:/usr/lib/java/bin
export JAVA_HOME CATALINA_BASE CATALINA_OPTS

testa=`ps ax | grep java | grep -c tomcat`

if [ $testa = 0 ]
then
        /u/bats/rc.tomcat start
fi
