<?php
   function pinger($address){
        if(strtolower(PHP_OS)=='winnt'){
            $command = "ping -n 1 $address";
            exec($command, $output, $status);
        }else{
            $command = "ping -c 1 $address";
            exec($command, $output, $status);
        }
        if($status === 0){
            return true;
        }else{
            return false;
        }
    }
$ip = $_GET['ip'];
$status = pinger($ip);
if($status == '1'){
	echo '<i class="fa-solid fa-circle-check bg-green"></i>';
}else{
	echo '<i class="fa-solid fa-circle-exclamation bg-red"></i>';
}
	
?>