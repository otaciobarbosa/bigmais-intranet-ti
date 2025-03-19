<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link href='//fonts.googleapis.com/css?family=Montserrat:thin,extra-light,light,100,200,300,400,500,600,700,800' rel='stylesheet' type='text/css'>						
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />						
	<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
</head>
<body>
    <div class="container mt-5" style="max-width:700px;">
    <div class="card">
        <div class="card-header">
            Últimas 5 Ligações Recebidas no Ramal <strong><?php echo $_GET["ramal"]; ?></strong>
        </div>
        <div class="card-body">
            <table id="call-table" class="table table-striped">
                <thead>
                    <tr>
                        <th>Ramal</th>
                        <th>Setor</th>
                        <th>Horário / Horário</th>                        
                    </tr>
                </thead>
                <tbody>
                    <!-- Registros das chamadas serão inseridos aqui -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function fetchCalls() {
        $.ajax({
            url: 'ajax/get_calls.php?ramal=<?php echo $_GET["ramal"]; ?>',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#call-table tbody').empty();
                data.forEach(function(call) {
                    $('#call-table tbody').append('<tr><td>' + call.ramal + '</td><td>' + call.setor + '</td><td>' + call.horario_ligacao + '</td></tr>');
                });
            },
            error: function() {
                console.error("Erro ao buscar os dados");
            }
        });
    }

    $(document).ready(function() {
        fetchCalls(); // Fetch initial data
        setInterval(fetchCalls, 10000); // Fetch data every 10 seconds
    });
</script>

</body>
</html>
