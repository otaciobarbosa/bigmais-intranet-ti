<?php
session_start();
if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>
<?php include 'db/connMSSQL.php'; ?>
<?php 
$select = $conexao->query("WITH  CPF_DUP AS 
(SELECT 
    P.CPF,
    COUNT(*) AS COUNT 
FROM PPESSOA P 
WHERE P.CPF IS NOT NULL AND P.CPF <> ''
GROUP BY P.CPF
HAVING  COUNT(*) > 1 )
 SELECT 
    P.CPF,
	P.CODIGO,
	P.NOME,
 	P.RECCREATEDBY,
	P.RECCREATEDON,
	P.RECMODIFIEDBY,
	P.RECMODIFIEDON,
	P.DATAAPROVACAOCURR,
	P.FUNCIONARIO,
	P.EXFUNCIONARIO,
	P.CANDIDATO
  FROM CPF_DUP C
  INNER JOIN PPESSOA P ON P.CPF = C.CPF
    WHERE  P.RECMODIFIEDON > '2025-03-15 00:00:00.000'
    ORDER BY P.RECMODIFIEDON DESC
");
         ?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <?php $title = 'Pessoas Duplicadas'; ?>
    <?php include 'custom/head.php'; ?>
</head>

<body class="container-fluid">
    <?php include 'custom/navbar.php'; ?>
    <div class="card">
        <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Pessoas duplicadas na PPESSOA</h4>
        </div>
        <div class="card-body">
            <table id="sessionsTable" class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>CPF</th>
                        <th>CODIGO</th>
                        <th>NOME</th>
                        <th>RECCREATEDBY</th>
                        <th>RECCREATEDON</th>
                        <th>RECMODIFIEDBY</th>
                        <th>RECMODIFIEDON</th>
                        <th>DATAAPROVACAOCURR</th>
                        <th>FUNCIONARIO</th>
                        <th>EXFUNCIONARIO</th>
                        <th>CANDIDATO</th>
                    </tr>
                </thead>
                <?php
         echo"<tbody>";
         while ($row = $select->fetch(PDO::FETCH_ASSOC)) {
           echo"<tr>";
           echo"<td >".$row['CPF']."</td>";
           echo"<td >".$row['CODIGO']."</td>";
           echo"<td >".$row['NOME']."</td>";
           echo"<td >".$row['RECCREATEDBY']."</td>";
           echo"<td >".$row['RECCREATEDON']."</td>";
           echo"<td >".$row['RECMODIFIEDBY']."</td>";
           echo"<td >".$row['RECMODIFIEDON']."</td>";
           echo"<td >".$row['DATAAPROVACAOCURR']."</td>";
           echo"<td >".$row['FUNCIONARIO']."</td>";
           echo"<td >".$row['EXFUNCIONARIO']."</td>";
           echo"<td >".$row['CANDIDATO']."</td>";
           echo" </tr>";
         }
         echo"  </tbody>";
         echo" </table>";
          ?>
        </div>


        <?php include 'custom/footer.php'; ?>
</body>

</html>