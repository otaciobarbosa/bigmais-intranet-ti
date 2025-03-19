<?php
include 'data/conexao.php';

$data = $_GET['data'];
$loja = $_GET['loja'];
$pdv  = $_GET['pdv'];

$entrada = "SELECT * FROM movimento_entrada_operador WHERE data_movimento = '$data' AND  numero_loja = '$loja' AND  numero_pdv = '$pdv'";
$resultEntrada  = mysqli_query($conn, $entrada);

$saida  = "SELECT * FROM movimento_saida_operador WHERE data_movimento = '$data' AND  numero_loja = '$loja' AND  numero_pdv = '$pdv'";
$resultSaida = mysqli_query($conn, $saida);

$movimento  = "SELECT * FROM movimento_operador WHERE data_movimento = '$data' AND  numero_loja = '$loja' AND  numero_pdv = '$pdv'";
$resultMovimento = mysqli_query($conn, $movimento);

$venda  = "SELECT * FROM capa_cupom_venda WHERE  data_venda = '$data' AND  numero_loja = '$loja' AND  numero_pdv = '$pdv' ORDER BY hora_venda";
$resultVenda = mysqli_query($conn, $venda);
?>
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br" xml:lang="pt-br">

<head>
    <?php include 'custom/header.php'; ?>
</head>

<body>
    <?php include 'custom/navbar.php'; ?>
    <div class="content-inner">
        <header class="page-header">
            <div class="container-fluid">
                <div class="no-margin-bottom">

                    <form class="form-inline" action="socin-movimento.php">
                        <label for="data">DATA:</label>
                        <input type="date" class="form-control" id="data" name="data">

                        &emsp;
                        <label for="loja">LOJA:</label>
                        <select class="form-control" id="loja" name="loja">
                            <option></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                        </select>

                        &emsp;
                        <label for="pdv">PDV:</label>
                        <select class="form-control" id="pdv" name="pdv">
                            <option></option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                            <option value="19">19</option>
                            <option value="20">20</option>
                            <option value="21">21</option>
                            <option value="22">22</option>
                            <option value="23">23</option>
                            <option value="24">24</option>
                            <option value="25">25</option>
                        </select>

                        &emsp;&emsp;
                        <button type="submit" class="btn btn-success btn-sm">
                            <i class="fa fa-search" aria-hidden="true"></i>
                            PESQUISAR
                        </button>
                        &emsp;
                        <a type="button" href="socin-movimento.php" class="btn btn-info btn-sm">
                            <i class="fa fa-refresh" aria-hidden="true"></i>
                        </a>
                    </form>&emsp;&emsp;
                    <form class="form-inline" action="consinco-apagar-gt.php" method='GET'>
                        <input type="hidden" id="data" name="data" value="<?php echo $data; ?>">
                        <input type="hidden" id="pdv" name="pdv" value="<?php echo $pdv; ?>">
                        <input type="hidden" id="loja" name="loja" value="<?php echo $loja; ?>">
                        <button type="submit" class="btn btn-danger btn-sm">
                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                            APAGAR GT
                        </button>
                    </form>
                </div>
            </div>
        </header>
        <div class="card">
            <div class="card-body">
                <h3>ENTRADA OPERADOR</h3>
                <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>DATA</th>
                            <th>SEQUENCIA</th>
                            <th>CODIGO</th>
                            <th>HORA</th>
                            <th>GT INICIAL</th>
                            <th>GT FINAL</th>
                            <th>CONTADOR INICIAL</th>
                            <th>CONTADOR FINAL</th>
                            <th>CONTADOR REDUCAO</th>
                            <th>CANCELADO</th>
                            <th>DESCONTO</th>
                            <th>CUPOM</th>
                            <th>NTC</th>
                            <th>APAGAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (mysqli_num_rows($resultEntrada) > 0) {
                            while($rowEntrada = mysqli_fetch_assoc($resultEntrada)) {
                            ?>
                        <tr>
                            <td style='text-align:center;'><?php echo $rowEntrada["data_movimento"]; ?></td>
                            <td style='text-align:center;'><?php echo $rowEntrada["sequencia_operador"]; ?>
                            </td>
                            <td style='text-align:center;'><?php echo $rowEntrada["codigo_operador"]; ?>
                            </td>
                            <td style='text-align:center;'><?php echo $rowEntrada["data_hora_entrada"]; ?>
                            </td>
                            <td style='text-align:center;'>
                                <?php echo $rowEntrada["grande_total_inicial"]; ?>
                            </td>
                            <td style='text-align:center;'><?php echo $rowEntrada["grande_total_final"]; ?>
                            </td>
                            <td style='text-align:center;'><?php echo $rowEntrada["contador_inicial"]; ?>
                            </td>
                            <td style='text-align:center;'><?php echo $rowEntrada["contador_final"]; ?></td>
                            <td style='text-align:center;'><?php echo $rowEntrada["contador_reducao"]; ?>
                            </td>
                            <td style='text-align:center;'><?php echo $rowEntrada["cancelado"]; ?></td>
                            <td style='text-align:center;'><?php echo $rowEntrada["desconto"]; ?></td>
                            <td style='text-align:center;'><?php echo $rowEntrada["numero_cupom_atual"]; ?>
                            </td>
                            <td style='text-align:center;'><?php echo $rowEntrada["mtc"]; ?></td>
                            <td style='text-align:center;'>
                                <a type="button"
                                    href="socin-apagar-entrada.php?data=<?php echo $data; ?>&loja=<?php echo $loja; ?>&pdv=<?php echo $pdv; ?>&sequencia=<?php echo $rowEntrada["sequencia_operador"]; ?>&codigo=<?php echo $rowEntrada["codigo_operador"]; ?>"
                                    class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    APAGAR
                                </a>
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="card">
            <div class="card-body">
            <h3>SAIDA OPERADOR</h3>
                <table class="table table-condensed table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>DATA</th>
                            <th>SEQUENCIA</th>
                            <th>CODIGO</th>
                            <th>HORA</th>
                            <th>GT INICIAL</th>
                            <th>GT FINAL</th>
                            <th>C INICIAL</th>
                            <th>C FINAL</th>
                            <th>C REDUCAO</th>
                            <th>CANCELADO</th>
                            <th>DESCONTO</th>
                            <th>CLIENTE</th>
                            <th>CUPOM</th>
                            <th>NTC</th>
                            <th>APAGAR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            if (mysqli_num_rows($resultSaida) > 0) {
                            while($rowSaida = mysqli_fetch_assoc($resultSaida)) {
                            ?>
                        <tr>
                            <td style='text-align:center;'><?php echo $rowSaida["data_movimento"]; ?></td>
                            <td style='text-align:center;'><?php echo $rowSaida["sequencia_operador"]; ?>
                            </td>
                            <td style='text-align:center;'><?php echo $rowSaida["codigo_operador"]; ?></td>
                            <td style='text-align:center;'><?php echo $rowSaida["data_hora_saida"]; ?></td>
                            <td style='text-align:center;'><?php echo $rowSaida["grande_total_inicial"]; ?>
                            </td>
                            <td style='text-align:center;'><?php echo $rowSaida["grande_total_final"]; ?>
                            </td>
                            <td style='text-align:center;'><?php echo $rowSaida["contador_inicial"]; ?></td>
                            <td style='text-align:center;'><?php echo $rowSaida["contador_final"]; ?></td>
                            <td style='text-align:center;'><?php echo $rowSaida["contador_reducao"]; ?></td>
                            <td style='text-align:center;'><?php echo $rowSaida["cancelado"]; ?></td>
                            <td style='text-align:center;'><?php echo $rowSaida["desconto"]; ?></td>
                            <td style='text-align:center;'><?php echo $rowSaida["numero_cliente_atend"]; ?>
                            </td>
                            <td style='text-align:center;'><?php echo $rowSaida["numero_cupom_atual"]; ?>
                            </td>
                            <td style='text-align:center;'><?php echo $rowSaida["mtc"]; ?></td>
                            <td style='text-align:center;'>
                                <a type="button"
                                    href="socin-apagar-saida.php?data=<?php echo $data; ?>&loja=<?php echo $loja; ?>&pdv=<?php echo $pdv; ?>&sequencia=<?php echo $rowSaida["sequencia_operador"]; ?>&codigo=<?php echo $rowSaida["codigo_operador"]; ?>"
                                    class="btn btn-danger btn-sm">
                                    <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                    APAGAR
                                </a>
                            </td>
                        </tr>
                        <?php }} ?>
                    </tbody>
                </table>

            </div>
        </div>
        <div class="card">
        <div class="card-body">
        <h3>MOVIMENTO OPERADOR</h3>
            <table class="table table-condensed table-bordered table-striped">
                <thead>
                    <tr>
                        <th>DATA</th>
                        <th>LOJA</th>
                        <th>PDV</th>
                        <th>SEQUENCIA</th>
                        <th>CODIGO</th>
                        <th>CODF</th>
                        <th>DESCF</th>
                        <th>SITUACAO</th>
                        <th>VALOR</th>
                        <th>TROCO</th>
                        <th>VALE</th>
                        <th>JUROS</th>
                        <th>SANGRIA</th>
                        <th>FC</th>
                        <th>DEV</th>
                        <th>QTD</th>
                        <th>DOCAO</th>
                        <th>STEF</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            if (mysqli_num_rows($resultMovimento) > 0) {
                            while($rowMovimento = mysqli_fetch_assoc($resultMovimento)) {
                            ?>
                    <tr>
                        <td style='text-align:center;'><?php echo $rowMovimento["data_movimento"]; ?>
                        </td>
                        <td style='text-align:center;'><?php echo $rowMovimento["numero_loja"]; ?></td>
                        <td style='text-align:center;'><?php echo $rowMovimento["numero_pdv"]; ?></td>
                        <td style='text-align:center;'>
                            <?php echo $rowMovimento["sequencia_operador"]; ?></td>
                        <td style='text-align:center;'><?php echo $rowMovimento["codigo_operador"]; ?>
                        </td>
                        <td style='text-align:center;'>
                            <?php echo $rowMovimento["codigo_finalizadora"]; ?></td>
                        <td style='text-align:left;'><?php echo $rowMovimento["desc_finalizadora"]; ?>
                        </td>
                        <td style='text-align:center;'><?php echo $rowMovimento["situacao"]; ?></td>
                        <td style='text-align:center;'><?php echo $rowMovimento["valor"]; ?></td>
                        <td style='text-align:center;'><?php echo $rowMovimento["troco"]; ?></td>
                        <td style='text-align:center;'><?php echo $rowMovimento["vale"]; ?></td>
                        <td style='text-align:center;'><?php echo $rowMovimento["juros"]; ?></td>
                        <td style='text-align:center;'><?php echo $rowMovimento["sangria"]; ?></td>
                        <td style='text-align:center;'><?php echo $rowMovimento["fundo_caixa"]; ?></td>
                        <td style='text-align:center;'><?php echo $rowMovimento["devolucao"]; ?></td>
                        <td style='text-align:center;'><?php echo $rowMovimento["quantidade"]; ?></td>
                        <td style='text-align:center;'><?php echo $rowMovimento["valor_doacao"]; ?></td>
                        <td style='text-align:center;'><?php echo $rowMovimento["saque_sitef"]; ?></td>

                    </tr>
                    <?php }} ?>
                </tbody>
            </table>

        </div>
    </div>
        <div class="card">
            <div class="card-body">
            <h3>VENDAS</h3>
                <div class="table-responsive">
                    <table id="vendas" class="table table-condensed table-bordered table-striped">
                        <thead>
                            <tr>
                                <th style='text-align:center;'>CUPOM</th>
                                <th style='text-align:center;'>OPERADOR</th>
                                <th style='text-align:center;'>SEQ</th>
                                <th style='text-align:center;'>SITUACAO</th>
                                <th style='text-align:center;'>TOTAL LIQ</th>
                                <th style='text-align:center;'>USU CANC</th>
                                <th style='text-align:center;'>CONVENIO</th>
                                <th style='text-align:center;'>CONVENIADO</th>
                                <th style='text-align:center;'>GERAR ENTRADA</th>
                                <th style='text-align:center;'>GERAR SAIDA</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if (mysqli_num_rows($resultVenda) > 0) {
                                $X = 0;
                                while($rowVenda = mysqli_fetch_assoc($resultVenda)) {
                                ?>
                            <tr>
                                <td style='text-align:center;'><?php echo $rowVenda["numero_cupom"]; ?></td>
                                <td style='text-align:center;'><?php echo $rowVenda["codigo_operador"]; ?>
                                </td>
                                <td style='text-align:center;'>
                                    <?php echo $rowVenda["sequencia_operador"]; ?></td>
                                <td style='text-align:center;'><?php echo $rowVenda["situacao_capa"]; ?>
                                </td>
                                <td style='text-align:center;'><?php echo $rowVenda["total_liquido"]; ?>
                                </td>
                                <td style='text-align:center;'><?php echo $rowVenda["usuario_cancelou"]; ?>
                                </td>
                                <td style='text-align:center;'><?php echo $rowVenda["codigo_convenio"]; ?>
                                </td>
                                <td style='text-align:center;'><?php echo $rowVenda["codigo_conveniado"]; ?>
                                </td>
                                <td style='text-align:center;'>

                                    <form class="form-inline" action="socin-gerar-entrada.php" method='GET'>

                                        <input type="text" class="form-control" id="sequencia" name="sequencia">
                                        <input type="hidden" id="data" name="data"
                                            value="<?php echo $rowVenda["data_venda"]; ?>">
                                        <input type="hidden" id="hora" name="hora"
                                            value="<?php echo $rowVenda["hora_venda"]; ?>">
                                        <input type="hidden" id="cupom" name="cupom"
                                            value="<?php echo $rowVenda["numero_cupom"]; ?>">
                                        <input type="hidden" id="operador" name="operador"
                                            value="<?php echo $rowVenda["codigo_operador"]; ?>">
                                        <input type="hidden" id="pdv" name="pdv" value="<?php echo $pdv; ?>">
                                        <input type="hidden" id="loja" name="loja" value="<?php echo $loja; ?>">
                </div>
                <button type="submit" class="btn btn-primary btn-sm">
                    <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span>
                    ENTRADA
                </button>
                </form>

                </td>
                <td style='text-align:center;'>

                    <form class="form-inline" action="socin-gerar-saida.php" method='GET'>

                        <input type="text" class="form-control" id="sequencia" name="sequencia">
            </div>
            <input type="hidden" id="data" name="data" value="<?php echo $rowVenda["data_venda"]; ?>">
            <input type="hidden" id="hora" name="hora" value="<?php echo $rowVenda["hora_venda"]; ?>">
            <input type="hidden" id="cupom" name="cupom" value="<?php echo $rowVenda["numero_cupom"]; ?>">
            <input type="hidden" id="operador" name="operador" value="<?php echo $rowVenda["codigo_operador"]; ?>">
            <input type="hidden" id="pdv" name="pdv" value="<?php echo $pdv; ?>">
            <input type="hidden" id="loja" name="loja" value="<?php echo $loja; ?>">
            <button type="submit" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span>
                SAIDA
            </button>
            </form>

            </td>
            </tr>
            <?php }} ?>
            </tbody>
            </table>
        </div>

    </div>
    </div>

    
    </div>
    <?php mysqli_close($conn); ?>
    <?php include 'custom/footer.php'; ?>
</body>

</html>