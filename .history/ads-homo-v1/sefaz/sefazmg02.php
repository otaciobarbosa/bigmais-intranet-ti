    <?php
    $servername = "192.168.2.218";
    $username = "root";
    $password = "B4nc0my5q1";
    $dbname = "concentrador";
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    
    // VALIDA PENDENTES
    $sqlValidaPendentes = "SELECT COUNT(*) total FROM mov_nfc WHERE sit_env_nfc =1;";
    $resultValidaPendentes = mysqli_query($conn, $sqlValidaPendentes);
    
    if (mysqli_num_rows($resultValidaPendentes) > 0) {
        while($rowValidaPendentes = mysqli_fetch_assoc($resultValidaPendentes)) {
           $totalCupons = $rowValidaPendentes["total"];
    
            // GERAR CARGA SEFAZ
            if($totalCupons <= 3 ){
                $sqlGeraCarga = "UPDATE mov_nfc SET sit_env_nfc='1' WHERE sit_env_nfc='99' LIMIT 45;";
                mysqli_query($conn, $sqlGeraCarga);
            }elseif($totalCupons >= '50' ){
                $sqlRemoveCarga = "UPDATE mov_nfc SET sit_env_nfc='99' WHERE sit_env_nfc ='1';";
                mysqli_query($conn, $sqlRemoveCarga); 
		
			$sqlGeraCarga2 = "UPDATE mov_nfc SET sit_env_nfc='1' WHERE sit_env_nfc='99' LIMIT 30;";
                mysqli_query($conn, $sqlGeraCarga2 );

            }
          }
    }
   
    
    mysqli_close($conn);
    ?>
