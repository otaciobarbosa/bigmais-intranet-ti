<?php
$servername = "192.168.0.220";
$username = "root";
$password = "bigmais.123";
$dbname = "asteriskcdrdb";
$ramal = $_GET['ramal'];
// Cria conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT src AS ramal, TIME(calldate) AS horario_ligacao
        FROM cdr
        WHERE dst = '".$ramal."'
        ORDER BY calldate DESC
        LIMIT 5";

$result = $conn->query($sql);

$calls = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $calls[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($calls);
?>
