load data infile '/var/www/html/intra/sistemas/rep/import/repimporta.csv'   INTO TABLE rep.importacao  FIELDS TERMINATED BY ';' ;
DELETE  FROM importacao WHERE imp_obs <> 'CALC'
