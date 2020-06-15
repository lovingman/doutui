<?php
// header("Content-type: text/html; charset=utf-8");
header('content-type:application/json');
header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段


$ip = $_SERVER['REMOTE_ADDR']; 
session_start();
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];


$mysqli = new mysqli("127.0.0.1", "root", "root", "yunkehuslangfang");  
    if(!$mysqli)  {  
        echo"database error";  
    }else{  
        //echo"php env successful";  
    }  
    //$mysqli->close();


if($userid==""){
/*
$result = array(
'status'=>"SUCCESS",
'tips'=>"notlogin"
);
echo json_encode($result);
*/
$userid=1;
	
} 
$mysqli->query('set names utf8;');
$sql = "SELECT * FROM `user` WHERE userid=".$userid.""; //SQL语句
$result = $mysqli->query($sql);  
$data=array();
while($row = $result->fetch_assoc()){ 
    $username=$row['username'];
    $telephone=$row['telephone'];
    $account=$row['account'];
    $bankcard=$row['bankcard'];
    $openbank=$row['openbank'];
	$fromid=$row['fromwho'];
    $dailiid=$row['dailiid'];
    $img=$row['img'];
}




$money = $_GET['money'];

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

$result = array(
'status'=>"SUCCESS",
'tip'=>"提现成功!预计1个工作日到账");
echo json_encode($result);
/////////////////////////////////////////wxpay/////////////////////////////////////////


?>
