<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADS - Big Mais Supermercados</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body style='background-color:#d9d9d9;'>

    <div class="container-fluid">
        <div class="col-md-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active"><a href="index.php">Home</a></li>
                        <?php
                         if ($diretorio = opendir("./"))
                         {
                            while(false !== ($pasta = readdir($diretorio)))
                            {
                               if(is_dir($pasta) and ($pasta != ".") and ($pasta != ".."))
                               {
                                  echo "<li><a  target='_blank' href='$pasta'>$pasta</a></li>";
                               }
                            }
                            closedir($diretorio);
                         }
                         ?>
                 </ul>
                </div>
                <div class="clearfix visible-lg"></div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>