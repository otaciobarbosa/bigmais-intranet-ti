cat imp.sql |grep INSERT > impnovo.sql
cat impnovo.sql|cut -c29-9999 > removido.sql
cat removido.sql|sed 's/$/;/' > final.sql
rm impnovo.sql
rm removido.sql
