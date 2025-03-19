<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-2">
    <div class="container-fluid">
        <a class="navbar-brand" href="painel.php">
            <i class="bi bi-boxes"></i>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="painel.php">
                        <i class="bi bi-house-door"></i>&ensp;Painel
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownIntranet" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-globe"></i>&ensp;Intranet
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownIntranet">
                        <li><a class="dropdown-item" href="usuarios-intranet.php">
                                <i class="bi bi-key"></i>&ensp;Alterar senha intranet
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="usuarios-painel-dp.php">
                                <i class="bi bi-lock"></i>&ensp;Alterar senha DP Analise
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="http://192.168.0.210/intra/sistemas/ifoodv3/app/painel.php"
                                target="_blank">
                                <i class="bi bi-boxes"></i>&ensp;Ifood
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBanco" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-database"></i>&ensp;Oracle
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownBanco">
                        <li><a class="dropdown-item" href="oracle-sessoes.php">
                                <i class="bi bi-person-x"></i>&ensp;Finalizar usuário travado
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li><a class="dropdown-item" href="oracle-processos.php">
                                <i class="bi bi-cpu"></i>&ensp;Processos</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="oracle-enviar-email.php">
                                <i class="bi bi-envelope-at"></i>&ensp;Enviar E-mail</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUtils" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-tools"></i>&ensp;Utilitários
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownUtils">
                        <li><a class="dropdown-item" href="gerar-senha.php">
                                <i class="bi bi-shield-lock"></i>&ensp;Gerador de Senhas
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="formatador-texto.php">
                                <i class="bi bi-text-paragraph"></i>&ensp;Formatador de Texto
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUtils" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-display"></i>&ensp;Socin
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownUtils">
                        <li><a class="dropdown-item" href="ads-index.php" target="_blank">
                                <i class="bi bi-boxes"></i></i>&ensp;ADS</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="socin-pre-vendas.php">
                                <i class="bi bi-braces"></i>&ensp;Pre Vendas</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="socin-status-pdv.php">
                                <i class="bi bi-arrow-repeat"></i>&ensp;Status PDV
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUtils" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-display"></i>&ensp;Consinco
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownUtils">
                        <li><a class="dropdown-item" href="painel-vendas-painel.php">
                                <i class="bi bi-filetype-sql"></i>
                                &ensp;Painel de Vendas
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="painel-vendas-vendas-hoje.php">
                                <i class="bi bi-filetype-sql"></i>
                                &ensp;Vendas Hoje
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="painel-vendas-vendas-data.php">
                                <i class="bi bi-filetype-sql"></i>
                                &ensp;Vendas por Data
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>


                        <li><a class="dropdown-item" href="consinco-vendas-pdv.php">
                                <i class="bi bi-filetype-sql"></i>
                                &ensp;Vendas PDV
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="consinco-lic-erp.php">
                                <i class="bi bi-filetype-sql"></i>
                                &ensp;Licenciamento do ERP
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="consinco-lic-rf.php">
                                <i class="bi bi-filetype-sql"></i>
                                &ensp;Licenciamento do RF
                            </a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUtils" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-display"></i>&ensp;Corpore RM
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownUtils">
                        <li><a class="dropdown-item" href="corporerm-pessoas-duplicadas.php">
                                <i class="bi bi-filetype-sql"></i>&ensp;Pessoas duplicadas na Integração</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownUtils" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-star"></i>&ensp;Acessos
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownUtils">
                        <li><a class="dropdown-item" href="painel-vendas-tv.php" target="_blank">
                                <i class="bi bi-globe"></i>&ensp;Painel TV</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="http://192.168.0.210:3000/portal/login" target="_blank">
                                <i class="bi bi-globe"></i>&ensp;Gestão Operacional</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="http://192.168.0.210:3006/portal/login" target="_blank">
                                <i class="bi bi-globe"></i>&ensp;Integração Revex</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="http://192.168.0.210:3002/portal/login" target="_blank">
                                <i class="bi bi-globe"></i>&ensp;Gestão RH</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="btn btn-secondary" href="logout.php">
                        <i class="bi bi-box-arrow-right"></i>&ensp;Sair
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>