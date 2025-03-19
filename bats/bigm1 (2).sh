ix=`date +%m%d`
mkdir /u/rede/backs/b$ix
mkdir /u/rede/backs/b$ix/bats
mkdir /u/rede/backs/b$ix/arq
mkdir /u/rede/backs/b$ix/arqa
mkdir /u/rede/backs/b$ix/arqh
mkdir /u/rede/backs/b$ix/arqp
mkdir /u/rede/backs/b$ix/sist
mkdir /u/rede/backs/b$ix/sist/arq
mkdir /u/rede/backs/b$ix/sist/arqa
mkdir /u/rede/backs/b$ix/sist/arqb 
mkdir /u/rede/backs/b$ix/sist/arqc
mkdir /u/rede/backs/b$ix/sist/arqd
mkdir /u/rede/backs/b$ix/sist/arqf
mkdir /u/rede/backs/b$ix/sist/arqi
mkdir /u/rede/backs/b$ix/sist/arqm
mkdir /u/rede/backs/b$ix/sist/arqp 
mkdir /u/rede/backs/b$ix/sist/arqv
mkdir /u/rede/backs/b$ix/sist/estd
cd /u/bats
rar a -y -r -inul /u/rede/backs/b$ix/bats/bats
cd /u/sistema/bigmais/arq
rar a -y -r -inul /u/rede/backs/b$ix/arq/arq
cd /u/sistema/bigmais/arqa
rar a -y -r -inul /u/rede/backs/b$ix/arqa/arqa
cd /u/sistema/bigmais/arqh
rar a -y -r -inul /u/rede/backs/b$ix/arqh/arqh
cd /u/sistema/bigmais/arqp
rar a -y -r -inul /u/rede/backs/b$ix/arqp/arqp
cd /u/sistema/bigmais/sist/arq
rar a -y -r -inul /u/rede/backs/b$ix/sist/arq/arq
cd /u/sistema/bigmais/sist/arqa
rar a -y -r -inul /u/rede/backs/b$ix/sist/arqa/arqa
cd /u/sistema/bigmais/sist/arqb
rar a -y -r -inul /u/rede/backs/b$ix/sist/arqb/arqb
cd /u/sistema/bigmais/sist/arqc
rar a -y -r -inul /u/rede/backs/b$ix/sist/arqc/arqc
cd /u/sistema/bigmais/sist/arqd
rar a -y -r -inul /u/rede/backs/b$ix/sist/arqd/arqd
cd /u/sistema/bigmais/sist/arqf
rar a -y -r -inul /u/rede/backs/b$ix/sist/arqf/arqf
cd /u/sistema/bigmais/sist/arqi
rar a -y -r -inul /u/rede/backs/b$ix/sist/arqi/arqi
cd /u/sistema/bigmais/sist/arqm
rar a -y -r -inul /u/rede/backs/b$ix/sist/arqm/arqm
cd /u/sistema/bigmais/sist/arqp
rar a -y -r -inul /u/rede/backs/b$ix/sist/arqp/arqp
cd /u/sistema/bigmais/sist/arqv
rar a -y -r -inul /u/rede/backs/b$ix/sist/arqv/arqv
cd /u/sistema/bigmais/sist/estd
rar a -y -r -inul /u/rede/backs/b$ix/sist/estd/estd
cd /u/rede/backs
chmod 777 -R b$ix