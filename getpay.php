<?php
// header("Content-type: text/html; charset=utf-8");
header('Content-Type:application/json; charset=utf-8');


$ip = $_SERVER['REMOTE_ADDR']; 
$username = $_GET['username'];
$telephone = $_GET['telephone'];
$money = $_GET['money'];

$mysqli = new mysqli("127.0.0.1", "root", "root", "yunkehuslangfang");  
    if(!$mysqli)  {  
        echo"database error";  
    }else{  
        //echo"php env successful";  
    }  
    
$mysqli->query('set names utf8;'); 
$ispay="1";
$sql="select ispay from pay where telephone='$telephone' order by id desc limit 1";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){ 
    $ispay=$row['ispay'];
}
if($ispay!="0"){
	$sql = "INSERT INTO `pay` (`id`, `username`, `telephone`, `money`) VALUES (NULL, '$username', '$telephone', '$money');"; //SQL璇彞
	$result = $mysqli->query($sql);
	
}
 echo "OK";
/////////////////////////////////////////wxpay/////////////////////////////////////////


?>
