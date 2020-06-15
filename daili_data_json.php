<?php
header('content-type:application/json');
header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段
/**************************************************/
/*

 
*/
/**************************************************/

//
error_reporting(0); 





session_start();
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];



$jibiename=$_GET['jibiename'];



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


	
	
	




$my_page="my.php";
$data_page="data.php";
$one_page="one.php";





$productlist = array();
$proone=array("jibiename"=>"V1");
array_push($productlist,$proone);
$proone=array("jibiename"=>"V2");
array_push($productlist,$proone);
$proone=array("jibiename"=>"V3");
array_push($productlist,$proone);
//////////抖音号
$douyinhaolist = array();
$proone=array("leibiename"=>"全部");
array_push($douyinhaolist,$proone);
$proone=array("leibiename"=>"自推");
array_push($douyinhaolist,$proone);
$proone=array("leibiename"=>"一级");
array_push($douyinhaolist,$proone);
$proone=array("leibiename"=>"二级");
array_push($douyinhaolist,$proone);

//////////////////////////////////////////

//$procname=$_GET['procname'];
//$douyinname=$_GET['douyinname'];
//$date=$_GET['date'];


	
$datalist = array();
$mysqli->query('set names utf8;');
$sql = "SELECT * FROM `user` WHERE fromwho in (select dailiid from user where telephone='$telephone')"; //SQL语句
if(isset($jibiename) && ($jibiename=='V1'||$jibiename=='V2'||$jibiename=='V3'||$jibiename=='合伙人'))
{
   $sql = "SELECT * FROM `user` WHERE fromwho in (select dailiid from user where telephone='$telephone') and classify='$jibiename'"; 
}
$result = $mysqli->query($sql);
$data=array();
while($row = $result->fetch_assoc()){
    $username=$row['username'];
    $telephone1=$row['telephone'];
    $account=$row['account'];
    $jointime=$row['jointime'];
    $bankcard=$row['bankcard'];
    $openbank=$row['openbank'];
    $fromid=$row['fromwho'];
    $dailiid=$row['dailiid'];
    $img="https://sf1-ttcdn-tos.pstatp.com/img/mosaic-legacy/3796/2975850990~120x256.image";
    $sql1 = "SELECT `wendaxingce`.`user`.`img` as img1 FROM `wendaxingce`.`user` WHERE `wendaxingce`.`user`.`telephone`='$telephone1' and length(`wendaxingce`.`user`.`img`)>10";
    $result1 = $mysqli->query($sql1);
    while($row1 = $result1->fetch_assoc()){
        $img=$row1['img1'];
    }
    $proone=array("userimg"=>$img,"username"=>$username,"datetime"=>$jointime);
    array_push($datalist,$proone);
}

$result = array(
'status'=>"SUCCESS",
'Ishuiyuan'=>"0",
'jibielist'=>$productlist,
'datalist'=>$datalist,
'my_page' =>$my_page,
'data_page' =>$data_page,
'one_page' =>$one_page,
);

echo json_encode($result);


?>

