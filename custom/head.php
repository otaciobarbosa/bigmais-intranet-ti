<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $title; ?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
body {
    min-height: 100vh;
    background: linear-gradient(to bottom, #f0f0f0, #c0c0c0);
    background-attachment: fixed;
}

.navbar-nav .nav-link,
.dropdown-menu .dropdown-item {
    transition: background-color 0.3s ease, color 0.3s ease;
}

.navbar-nav .nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1);
    color: #f8f9fa;
    border-radius: 5px;
}

.dropdown-menu .dropdown-item:hover {
    background-color: #343a40;
    color: #f8f9fa;
}
</style>
<link rel="icon" type="image/png" href="custom/icon.png">