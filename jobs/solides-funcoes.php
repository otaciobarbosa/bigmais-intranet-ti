<?php

  include 'solides.config.php';
  include 'corporerm.config.php';

  $queryLimpaTabelaIntegracao = "TRUNCATE TABLE ZMDSLDCARGOFUNCAO";
  $limpaTabelaIntegracao = $conexao->query($queryLimpaTabelaIntegracao);

  $curl = curl_init();
  
  curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://app.solides.com/pt-BR/api/v1/cargos',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET',
    CURLOPT_HTTPHEADER => array(
      'Accept: application/json',
      'Authorization: '. $token
    ),
  ));
  
  $response = curl_exec($curl);

  curl_close($curl);
  
  include 'corporerm.config.php';
  $limpaTabelaZMDSLDCARGOFUNCAO = "TRUNCATE TABLE ZMDSLDCARGOFUNCAO";
  $truncateTable = $conexao->query($limpaTabelaZMDSLDCARGOFUNCAO);
  echo "limpaTabelaZMDSLDCARGOFUNCAO = " ;
  var_dump($truncateTable);
  echo "<hr /><br />";

  if ($response) {
      $data = json_decode($response, true);
  
      if ($data === null) {
          echo "Erro na decodificação JSON\n";
      } else {
          foreach ($data as $cargo) {
              echo "<br /> id = " . $id = $cargo['id'];
              echo "<br />name = " . $name = $cargo['name'];
              echo "<br />vinculo_externos = " . $vinculo_externos = $cargo['vinculo_externos'];
  
              if (is_array($vinculo_externos)) {
                  foreach ($vinculo_externos as $vinculo) {
                      echo "<br />externalId = " .$externalId = $vinculo['externalId'];
                      echo "<br />targetSystem = " .$targetSystem = $vinculo['targetSystem'];
                      echo "<br />linkedTo = " .$linkedTo = $vinculo['linkedTo'];
                      echo "<hr /><br />";

                      include 'corporerm.config.php';
                      $cadastraFuncao = "INSERT INTO ZMDSLDCARGOFUNCAO(CODFUNCAORM,DESCFUNCAORM,CODFUNCAOSLD) VALUES ('$externalId','$name','$id')";
                      $cadastra = $conexao->query($cadastraFuncao);
                      $conexao = null;
                  }
              }
          }
      }
  } else {
      echo "Erro na solicitação cURL\n";
      $conexao = null;
  }
  echo "Funções cadastradas com sucesso!";
?>