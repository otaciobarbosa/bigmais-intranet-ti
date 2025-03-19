<?php
$output = shell_exec('w | grep node');
$lines = explode('\n', $output);
$data = array();

foreach ($lines as $line) {
    $cols = preg_split('/\s+/', $line);

    var_dump($cols);

if (count($cols) == 11) {
$data[] = array($user = $cols[0],
$tty = $cols[1],
$from = $cols[2],
$login = $cols[3] . $cols[4],
$idle = $cols[5],
$jcpu = $cols[6],
$pcpu = $cols[7],
$what = $cols[8] . $cols[9] .  $cols[10]
);
}
}

$json = json_encode($data);
// echo $json;
?>