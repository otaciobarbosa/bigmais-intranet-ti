<?php 
 $pageName = basename($_SERVER['PHP_SELF']); 
 $pasta = 'downloads/';
 $arquivos = scandir($pasta);
 $numeroDeArquivos = count($arquivos) - 2;
?>

<div class="page">
    <header class="header">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-holder d-flex align-items-center justify-content-between">
                    <div class="navbar-header">
                        <a href="index.php" class="navbar-brand">
                            <div class="brand-text brand-big">
                                <strong>
                                    Big Mais Supermercados
                                </strong>
                            </div>
                            <div class="brand-text brand-small"><strong>BM</strong></div>
                        </a>
                        <a id="toggle-btn" href="#" class="menu-btn active"><span></span><span></span><span></span></a>
                    </div>
                    <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="page-content d-flex align-items-stretch">
        <nav class="side-navbar">
            <span class="heading">
                <center>
                    Menu
                </center>
            </span>
            <ul class="list-unstyled">
                <li>
                    <a href="index.php" <?php if($pageName == 'index.php'){ echo 'class="active" style="background-color:#A42222;"'; } ?>>
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        GERAR ABC
                    </a>
                </li>
                <li>
                    <a href="download.php" <?php if($pageName == 'download.php'){ echo 'class="active" style="background-color:#A42222;"'; } ?>>
                        <i class="fa fa-download" aria-hidden="true"></i>
                        DOWNLOAD
                        <span class="badge badge-secondary"><?php echo $numeroDeArquivos; ?></span>
                    </a>
                </li>
            </ul>
        </nav>