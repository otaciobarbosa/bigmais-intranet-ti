<!DOCTYPE html>
<html lang="pt-br" translate="no">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Atualizar App</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
       <center>
        <div class="jumbotron">
          <h4>Download de aplicativos</h4> 
          <br>
          <?php
          $path = "apk/2301004/";
          $types = array( 'apk' );
          if ( $handle = opendir($path) ) {
            while ( $entry = readdir( $handle ) ) {
              $ext = strtolower( pathinfo( $entry, PATHINFO_EXTENSION) );
              if( in_array( $ext, $types ) ) 
                echo"<a href='$path$entry' class='btn btn-info btn-block' role='button'>$entry</a><br>";
            }
            closedir($handle);
          }  
          ?>
          
        </div>
      </center>
    </div>
  </div>
</div>
</body>
</html>