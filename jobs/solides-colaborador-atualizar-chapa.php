<?php
$chapa = $_GET['chapa'];

 echo "<hr />";
 
      try {       

        function formatarData($data) {
          if (!empty($data)) {
              $data_formatada = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $data)));
              return $data_formatada;
          }
          return null;
      }
      
      function tratarAcentos($texto) {
        if (!empty($texto)) {
            $texto_tratado = utf8_encode($texto);
            return $texto_tratado;
        }
        return null;
    }
    include 'corporerm.config.php'; 
        $query = "SELECT * FROM OBVSLDFUNC A WHERE A.CHAPA = '".$chapa."'";
        $funcionariosSemCodigo = $conexao->query($query);
  
        if (!$funcionariosSemCodigo) {
            throw new Exception("Erro na consulta SQL: " . $conexao->errorInfo()[2]);
        }
    
        while ($rowFuncionariosAtualizar = $funcionariosSemCodigo->fetch(PDO::FETCH_ASSOC)) {


        print("<pre>");    
        print_r($rowFuncionariosAtualizar);
        print("</pre>");  

        include 'solides.config.php';
       
         
        $curl = curl_init();

        $solides =  mb_convert_encoding(addslashes($rowFuncionariosAtualizar["CODSOLIDES"]), "UTF-8", "ISO-8859-1");
        $name = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["name"]), "UTF-8", "ISO-8859-1");
        $email = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["email"]), "UTF-8", "ISO-8859-1");
        $cpf = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["cpf"]), "UTF-8", "ISO-8859-1");
        $birthDate = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["birthDate"]), "UTF-8", "ISO-8859-1");
        $gender = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["gender"]), "UTF-8", "ISO-8859-1");
        $maritalStatus = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["maritalStatus"]), "UTF-8", "ISO-8859-1");
        $education = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["education"]), "UTF-8", "ISO-8859-1");
        $nationality = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["nationality"]), "UTF-8", "ISO-8859-1");
        $birthPlace = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["birthPlace"]), "UTF-8", "ISO-8859-1");
        $fatherName = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["fatherName"]), "UTF-8", "ISO-8859-1");
        $motherName = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["motherName"]), "UTF-8", "ISO-8859-1");
        $zipCode    =  mb_convert_encoding(addslashes($rowFuncionariosAtualizar["zipCode"]), "UTF-8", "ISO-8859-1");
        $countryAcronym = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["countryAcronym"]), "UTF-8", "ISO-8859-1");
        $stateAcronym = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["stateAcronym"]), "UTF-8", "ISO-8859-1");
        $city = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["city"]), "UTF-8", "ISO-8859-1");
        $neighborhood = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["neighborhood"]), "UTF-8", "ISO-8859-1");
        $streetName = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["streetName"]), "UTF-8", "ISO-8859-1");
        $number = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["number"]), "UTF-8", "ISO-8859-1");
        $additionalInformation = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["additionalInformation"]), "UTF-8", "ISO-8859-1");
        $phone = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["phone"]), "UTF-8", "ISO-8859-1");
        $cellPhone = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["cellPhone"]), "UTF-8", "ISO-8859-1");
        $emergencyPhoneNumber = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["emergencyPhoneNumber"]), "UTF-8", "ISO-8859-1");
        $personalEmail = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["personalEmail"]), "UTF-8", "ISO-8859-1");
        $corporateEmail = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["corporateEmail"]), "UTF-8", "ISO-8859-1");
        $departamentId = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["departamentId"]), "UTF-8", "ISO-8859-1");
        $positionId = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["positionId"]), "UTF-8", "ISO-8859-1");
        $unityId = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["unityId"]), "UTF-8", "ISO-8859-1");
        $typeContract = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["typeContract"]), "UTF-8", "ISO-8859-1");
        $dateContract = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["dateContract"]), "UTF-8", "ISO-8859-1");
        $contractDuration = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["contractDuration"]), "UTF-8", "ISO-8859-1");
        $contractExpirationDate = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["contractExpirationDate"]), "UTF-8", "ISO-8859-1");
        $registration = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["registration"]), "UTF-8", "ISO-8859-1");
        $senior = '';
        $salary = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["salary"]), "UTF-8", "ISO-8859-1");
        $workShift = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["workShift"]), "UTF-8", "ISO-8859-1");
        $hierarchicalLevel = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["hierarchicalLevel"]), "UTF-8", "ISO-8859-1");
        $dateAdmission = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["dateAdmission"]), "UTF-8", "ISO-8859-1");
        $dateDismissal = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["dateDismissal"]), "UTF-8", "ISO-8859-1");
        $idNumber = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["cpf"]), "UTF-8", "ISO-8859-1");
        $rg = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["rg"]), "UTF-8", "ISO-8859-1");
        $data_expedicao = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["data_expedicao"]), "UTF-8", "ISO-8859-1");
        $orgao_expedidor = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["orgao_expedidor"]), "UTF-8", "ISO-8859-1");
        $voterRegistration = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["voterRegistration"]), "UTF-8", "ISO-8859-1");
        $electoralZone = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["electoralZone"]), "UTF-8", "ISO-8859-1");
        $electoralSection = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["electoralSection"]), "UTF-8", "ISO-8859-1");
        $ctpsNum = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["ctpsNum"]), "UTF-8", "ISO-8859-1");
        $ctpsSerie = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["ctpsSerie"]), "UTF-8", "ISO-8859-1");
        $reservist = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["reservist"]), "UTF-8", "ISO-8859-1");
        $nqc = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["nqc"]), "UTF-8", "ISO-8859-1");
        $bank = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["bank"]), "UTF-8", "ISO-8859-1");
        $agency = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["agency"]), "UTF-8", "ISO-8859-1");
        $checkingsAccount = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["checkingsAccount"]), "UTF-8", "ISO-8859-1");
        $pis = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["pis"]), "UTF-8", "ISO-8859-1");
        $disabledPerson = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["disabledPerson"]), "UTF-8", "ISO-8859-1");
        $typeOfSpecialNeed = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["typeOfSpecialNeed"]), "UTF-8", "ISO-8859-1");
        $salutation = mb_convert_encoding(addslashes($rowFuncionariosAtualizar["salutation"]), "UTF-8", "ISO-8859-1");
        
        $url = $host . 'colaboradores/' .$solides;

         echo $solides ."<br>";
         echo $url ."<br>";

        curl_setopt_array($curl, array(
          CURLOPT_URL => $url,
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'PUT',
          CURLOPT_POSTFIELDS =>'{
            "name": "'.$name.'",
            "email": "'.$email.'",
            "cpf": "'.$cpf.'",
            "birthDate": "'.$birthDate.'",
            "gender": "'.$gender.'",
            "maritalStatus": "'.$maritalStatus.'",
            "education": "'.$education.'",
            "nationality": "'.$nationality.'",
            "birthPlace": "'.$birthPlace.'",
            "fatherName": "'.$fatherName.'",
            "motherName": "'.$motherName.'",
            "zipCode": "123",
            "countryAcronym": "'.$countryAcronym.'",
            "stateAcronym": "'.$stateAcronym.'",
            "city": "'.$city.'",
            "neighborhood": "'.$neighborhood.'",
            "streetName": "'.$streetName.'",
            "number": "'.$number.'",
            "additionalInformation": "'.$additionalInformation.'",
            "phone": "'.$phone.'",
            "cellPhone": "'.$cellPhone.'",
            "emergencyPhoneNumber": "'.$emergencyPhoneNumber.'",
            "personalEmail": "'.$personalEmail.'",
            "corporateEmail": "'.$corporateEmail.'",
            "departamentId": "'.$departamentId.'",
            "positionId": "'.$positionId.'",
            "unityId": "'.$unityId.'",
            "typeContract": "'.$typeContract.'",
            "dateContract": "'.$dateContract.'",
            "contractDuration": "'.$contractDuration.'",
            "contractExpirationDate":"'.$contractExpirationDate.'",
            "registration": "'.$registration.'",
            "senior": "'.$senior.'",
            "salary": "'.$salary.'",
            "workShift": "'.$workShift.'",
            "hierarchicalLevel": "'.$hierarchicalLevel.'",
            "dateAdmission": "'.$dateAdmission.'",
            "dateDismissal": "'.$dateDismissal.'",
            "idNumber": "'.$idNumber.'",
            "rg": "'.$rg.'",
            "data_expedicao": "'.$data_expedicao.'",
            "orgao_expedidor": "'.$orgao_expedidor.'",
            "voterRegistration": "'.$voterRegistration.'",
            "electoralZone": "'.$electoralZone.'",
            "electoralSection": "'.$electoralSection.'",
            "ctpsNum": "'.$ctpsNum.'",
            "ctpsSerie": "'.$ctpsSerie.'",
            "reservist": "'.$reservist.'",
            "nqc": "'.$nqc.'",
            "bank": "'.$bank.'",
            "agency": "'.$agency.'",
            "checkingsAccount": "'.$checkingsAccount.'",
            "pis": "'.$pis.'",
            "disabledPerson": "'.$disabledPerson.'",
            "typeOfSpecialNeed": "'.$typeOfSpecialNeed.'",
            "salutation": "'.$salutation.'"
        }
        ',
          CURLOPT_HTTPHEADER => array(
            'Authorization: '. $token,
            'Content-Type: application/json'
          ),
        ));

        $response = curl_exec($curl);

        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
              
        curl_close($curl);
         
        print("<pre>");    
        print_r($httpCode);
        print("</pre>");  

        print("<pre>");    
        print_r($response);
        print("</pre>");  
   
    if($httpCode <> 200){
      $resp = $response;
    }else{
      $resp = $httpCode;
    }

        include 'corporerm.config.php';
        if($solides){
        $sql = 'INSERT INTO ZMDSLDINTEGRACAO (
            solides,
            name,
            email,
            cpf,
            birthDate,
            gender,
            maritalStatus,
            education,
            nationality,
            birthPlace,
            fatherName,
            motherName,
            zipCode,
            countryAcronym,
            stateAcronym,
            city,
            neighborhood,
            streetName,
            number,
            additionalInformation,
            phone,
            cellPhone,
            emergencyPhoneNumber,
            personalEmail,
            corporateEmail,
            departamentId,
            positionId,
            unityId,
            typeContract,
            dateContract,
            contractDuration,
            contractExpirationDate,
            registration,
            senior,
            salary,
            workShift,
            hierarchicalLevel,
            dateAdmission,
            dateDismissal,
            idNumber,
            rg,
            data_expedicao,
            orgao_expedidor,
            voterRegistration,
            electoralZone,
            electoralSection,
            ctpsNum,
            ctpsSerie,
            reservist,
            nqc,
            bank,
            agency,
            checkingsAccount,
            pis,
            disabledPerson,
            typeOfSpecialNeed,
            salutation,
            datahoraint,
            status_code,
            url,
            response
        ) VALUES (
            :solides,
            :name,
            :email,
            :cpf,
            :birthDate,
            :gender,
            :maritalStatus,
            :education,
            :nationality,
            :birthPlace,
            :fatherName,
            :motherName,
            :zipCode,
            :countryAcronym,
            :stateAcronym,
            :city,
            :neighborhood,
            :streetName,
            :number,
            :additionalInformation,
            :phone,
            :cellPhone,
            :emergencyPhoneNumber,
            :personalEmail,
            :corporateEmail,
            :departamentId,
            :positionId,
            :unityId,
            :typeContract,
            :dateContract,
            :contractDuration,
            :contractExpirationDate,
            :registration,
            :senior,
            :salary,
            :workShift,
            :hierarchicalLevel,
            :dateAdmission,
            :dateDismissal,
            :idNumber,
            :rg,
            :data_expedicao,
            :orgao_expedidor,
            :voterRegistration,
            :electoralZone,
            :electoralSection,
            :ctpsNum,
            :ctpsSerie,
            :reservist,
            :nqc,
            :bank,
            :agency,
            :checkingsAccount,
            :pis,
            :disabledPerson,
            :typeOfSpecialNeed,
            :salutation,
            :datahoraint,
            :status_code,
            :url,
            :resp
        )';
        
        $stmt = $conexao->prepare($sql);

        $stmt->bindParam(':solides', $solides);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':cpf', $cpf);
        $stmt->bindParam(':birthDate', formatarData($birthDate));
        $stmt->bindParam(':gender', $gender);
        $stmt->bindParam(':maritalStatus', $maritalStatus);
        $stmt->bindParam(':education', tratarAcentos($education));
        $stmt->bindParam(':nationality', $nationality);
        $stmt->bindParam(':birthPlace', $birthPlace);
        $stmt->bindParam(':fatherName', $fatherName);
        $stmt->bindParam(':motherName', $motherName);
        $stmt->bindParam(':zipCode', $zipCode);
        $stmt->bindParam(':countryAcronym', $countryAcronym);
        $stmt->bindParam(':stateAcronym', $stateAcronym);
        $stmt->bindParam(':city', $city);
        $stmt->bindParam(':neighborhood', $neighborhood);
        $stmt->bindParam(':streetName', $streetName);
        $stmt->bindParam(':number', $number);
        $stmt->bindParam(':additionalInformation', $additionalInformation);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':cellPhone', $cellPhone);
        $stmt->bindParam(':emergencyPhoneNumber', $emergencyPhoneNumber);
        $stmt->bindParam(':personalEmail', $personalEmail);
        $stmt->bindParam(':corporateEmail', $corporateEmail);
        $stmt->bindParam(':departamentId', $departamentId);
        $stmt->bindParam(':positionId', $positionId);
        $stmt->bindParam(':unityId', $unityId);
        $stmt->bindParam(':typeContract', $typeContract);
        $stmt->bindParam(':dateContract', formatarData($dateContract));
        $stmt->bindParam(':contractDuration', $contractDuration);
        $stmt->bindParam(':contractExpirationDate', formatarData($contractExpirationDate));
        $stmt->bindParam(':registration', formatarData($registration));
        $stmt->bindParam(':senior', $senior);
        $stmt->bindParam(':salary', $salary);
        $stmt->bindParam(':workShift', $workShift);
        $stmt->bindParam(':hierarchicalLevel', tratarAcentos($hierarchicalLevel));
        $stmt->bindParam(':dateAdmission', formatarData($dateAdmission));
        $stmt->bindParam(':dateDismissal', formatarData($dateDismissal));
        $stmt->bindParam(':idNumber', $idNumber);
        $stmt->bindParam(':rg', $rg);
        $stmt->bindParam(':data_expedicao', formatarData($data_expedicao));
        $stmt->bindParam(':orgao_expedidor', $orgao_expedidor);
        $stmt->bindParam(':voterRegistration', $voterRegistration);
        $stmt->bindParam(':electoralZone', $electoralZone);
        $stmt->bindParam(':electoralSection', $electoralSection);
        $stmt->bindParam(':ctpsNum', $ctpsNum);
        $stmt->bindParam(':ctpsSerie', $ctpsSerie);
        $stmt->bindParam(':reservist', $reservist);
        $stmt->bindParam(':nqc', $nqc);
        $stmt->bindParam(':bank', $bank);
        $stmt->bindParam(':agency', $agency);
        $stmt->bindParam(':checkingsAccount', $checkingsAccount);
        $stmt->bindParam(':pis', $pis);
        $stmt->bindParam(':disabledPerson', $disabledPerson);
        $stmt->bindParam(':typeOfSpecialNeed', $typeOfSpecialNeed);
        $stmt->bindParam(':salutation', $salutation);
        $stmt->bindParam(':datahoraint', date("Y-m-d H:i:s"));
        $stmt->bindParam(':status_code', $status_code);
        $stmt->bindParam(':url', $url);
        $stmt->bindParam(':resp', $resp);
        
        if ($stmt->execute()) {
        } else {
            throw new Exception("Erro na consulta SQL: " . $stmt->errorInfo()[2]);
        }
        
        $conexao = null; 
      }
        
        }
    } catch (Exception $e) {
        echo "Erro: " . $e->getMessage();
    }  
    
    $conexao = null;

    echo "<hr />";
?>