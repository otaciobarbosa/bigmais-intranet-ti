<?php
// server_ping.php

function pinger($address) {
    $command = (strtolower(PHP_OS) == 'winnt') ? "ping -n 1 $address" : "ping -c 1 $address";
    exec($command, $output, $status);
    return $status === 0;
}

$ip = isset($_GET['ip']) ? $_GET['ip'] : '';
$known_ips = ['192.168.0.77', '192.168.0.142', '192.168.0.243', '192.168.0.203'];

$status = pinger($ip);

if (in_array($ip, $known_ips)) {
    $img = $status ? 'server_ok.png' : 'server_error.png';
} else {
    $img = $status ? 'vm_icon_ok.png' : 'vm_icon_erro.png';
}

echo "<img src='img/$img' style='width:30px;'>";
?>
