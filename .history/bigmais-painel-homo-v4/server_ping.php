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

if($ip == '192.168.0.77' || $ip == '192.168.0.142' || $ip == '192.168.0.243' || $ip == '192.168.0.203') {

if($status == '1'){
	echo '<img src="img/server_ok.png" style="width:30px;">';
}else{
	echo '<img src="img/server_error.png" style="width:30px;">';
}

}else{

if($status == '1'){
	echo '<img src="img/vm_icon_ok.png" style="width:30px;">';
}else{
	echo '<img src="img/vm_icon_erro.png" style="width:30px;">';
}

}

?>