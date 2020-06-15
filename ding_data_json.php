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



$procname=$_GET['procname'];
$leibiename=$_GET['leibiename'];
$date=$_GET['datetime'];

$classify='';
if($leibiename=="自推")
   $classify="self";
if($leibiename=="一级")
   $classify="yiji";
if($leibiename=="二级")
   $classify="erji";
$dateend=$_GET['datetime']." 23:59:59";

$datastart=$_GET['datetime']." 00:00:00";






if($procname=="心理测试")
    $database="xingce";
if($procname=="缘分配对")
    $database="yuanfen";
if($procname=="状元评测")
    $database="langfang";



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
$proone=array("procname"=>"心理测试");
array_push($productlist,$proone);
$proone=array("procname"=>"缘分配对");
array_push($productlist,$proone);
$proone=array("procname"=>"状元评测");
array_push($productlist,$proone);
//////////抖音号
$douyinhaolist = array();
$proone=array("leibiename"=>"CPS");
array_push($douyinhaolist,$proone);
$proone=array("leibiename"=>"CPM");
array_push($douyinhaolist,$proone);
//$proone=array("leibiename"=>"一级");
//array_push($douyinhaolist,$proone);
//$proone=array("leibiename"=>"二级");
//array_push($douyinhaolist,$proone);

//////////////////////////////////////////

//$procname=$_GET['procname'];
//$douyinname=$_GET['douyinname'];
//$date=$_GET['date'];


	

$datalist = array();
$img="http://www.coolfuture.xyz/lingxi/a.jpg";
$mysqli->query('set names utf8;');
$sql1 = "SELECT `wenda$database`.`user`.`img` as img1 FROM `wenda$database`.`user` WHERE `wenda$database`.`user`.`telephone`='$telephone' and length(`wenda$database`.`user`.`img`)>10";
$result1 = $mysqli->query($sql1); 
while($row1 = $result1->fetch_assoc()){
    $img=$row1['img1'];
} 


$sql = "SELECT * FROM `payrecord` WHERE classify!='yao' and pay_status='TRADE_SUCCESS' and fromid ='$telephone' and testtime<'$dateend' and testtime>='$datastart' and xcx='$database' and classify like '%$classify%'"; //SQL语句
$result = $mysqli->query($sql);  
while($row = $result->fetch_assoc()){ 
    $timuid=$row['timuid'];
    $fromid=$row['fromid'];
    $testtime=$row['testtime'];
    $money=round($row['money']/100,2);
    if($leibiename=="CPM")
       $money="完播";
    $proone=array("userimg"=>$img,"username"=>$row['nickname'],"timu"=>"第".$timuid."题","money"=>$money,"datetime"=>$testtime);
    array_push($datalist,$proone);
}



$sql = "SELECT count(*) as zituinum FROM `payrecord` WHERE fromid ='$telephone' and testtime<'$dateend' and testtime>='$datastart' and classify='self' and xcx='$database'"; //SQL语句
$result = $mysqli->query($sql);  
while($row = $result->fetch_assoc()){ 
    $zituinum=$row['zituinum'];
}
$sql = "SELECT count(*) as zituiding,IFNULL(sum(ordermoney),0) as zituijin,IFNULL(sum(money),0) as zituiyong FROM `payrecord` WHERE pay_status='TRADE_SUCCESS' and classify='self' and fromid ='$telephone' and testtime<'$dateend' and testtime>='$datastart' and xcx='$database'"; //SQL语句
$result = $mysqli->query($sql);  
while($row = $result->fetch_assoc()){ 
    $zituiding=$row['zituiding'];
    $zituijin=round($row['zituijin']/100,2);
    $zituiyong=round($row['zituiyong']/100,2);
}
//$zituijin=round(0.9*$zituiding,2);
//$zituiyong=round(0.9*0.75*$zituiding,2);




//////////////////////////
/*
$sql = "SELECT count(*) as yijinum FROM `wenda$database`.`test` WHERE fromid in (select openid from `wenda$database`.`user` where telephone in (select telephone from user where fromwho='$dailiid')) and testtime<'$dateend' and testtime>='$datastart'"; //SQL语句
$result = $mysqli->query($sql);  
while($row = $result->fetch_assoc()){ 
    $yijinum=$row['yijinum'];
}
$sql = "SELECT count(*) as yijiding FROM `wenda$database`.`test` WHERE pay_status='TRADE_SUCCESS' and fromid in (select openid from `wenda$database`.`user` where telephone in (select telephone from user where fromwho='$dailiid')) and testtime<'$dateend' and testtime>='$datastart'"; //SQL语句
$result = $mysqli->query($sql);  
while($row = $result->fetch_assoc()){ 
    $yijiding=$row['yijiding'];
}
$yijijin=round(0.9*$yijiding,2);
$yijiyong=round(0.9*0.1*$yijiding,2);
*/
$sql = "SELECT count(*) as zituinum FROM `payrecord` WHERE fromid ='$telephone' and testtime<'$dateend' and testtime>='$datastart' and classify='yiji' and xcx='$database'"; //SQL语句
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
    $yijinum=$row['zituinum'];
}
$sql = "SELECT count(*) as zituiding,IFNULL(sum(ordermoney),0) as zituijin,IFNULL(sum(money),0) as zituiyong FROM `payrecord` WHERE pay_status='TRADE_SUCCESS' and classify='yiji' and fromid ='$telephone' and testtime<'$dateend' and testtime>='$datastart' and xcx='$database'"; //SQL语句
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
    $yijiding=$row['zituiding'];
    $yijijin=round($row['zituijin']/100,2);
    $yijiyong=round($row['zituiyong']/100,2);
}


/*
$sql = "SELECT count(*) as erjinum FROM `wenda$database`.`test` WHERE fromid in (select openid from `wenda$database`.`user` where telephone in (select telephone from user where fromwho in (select dailiid from user where fromwho='$dailiid'))) and testtime<'$dateend' and testtime>='$datastart'"; //SQL语句
$result = $mysqli->query($sql);  
while($row = $result->fetch_assoc()){ 
    $erjinum=$row['erjinum'];
}
$sql = "SELECT count(*) as erjiding FROM `wenda$database`.`test` WHERE pay_status='TRADE_SUCCESS' and fromid in (select openid from `wenda$database`.`user` where telephone in (select telephone from user where fromwho in (select dailiid from user where fromwho='$dailiid'))) and testtime<'$dateend' and testtime>='$datastart'"; //SQL语句
$result = $mysqli->query($sql);  
while($row = $result->fetch_assoc()){ 
    $erjiding=$row['erjiding'];
}
$erjijin=round(0.9*$erjiding,2);
$erjiyong=round(0.9*0.1*$erjiding,2);
*/
$sql = "SELECT count(*) as zituinum FROM `payrecord` WHERE fromid ='$telephone' and testtime<'$dateend' and testtime>='$datastart' and classify='erji' and xcx='$database'"; //SQL语句
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
    $erjinum=$row['zituinum'];}
$sql = "SELECT count(*) as zituiding,IFNULL(sum(ordermoney),0) as zituijin,IFNULL(sum(money),0) as zituiyong FROM `payrecord` WHERE pay_status='TRADE_SUCCESS' and classify='erji' and fromid ='$telephone' and testtime<'$dateend' and testtime>='$datastart' and xcx='$database'"; //SQL语句
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
    $erjiding=$row['zituiding'];
    $erjijin=round($row['zituijin']/100,2);
    $erjiyong=round($row['zituiyong']/100,2);
}

$leibiedata=array();
if($leibiename=="CPM")
{
    $zituiyong1=0.03*$zituinum;
    $zituiyong2=0.2*$zituinum;
    $zituiyong=$zituiyong1."~".$zituiyong2;
    $proone=array("title"=>"自推","detail1"=>"访问人数","num1"=>$zituinum,"detail2"=>"完播数量","num2"=>$zituiding,"detail3"=>"预估eCPM","num3"=>"30~200","detail4"=>"预估佣金","num4"=>$zituiyong);
    array_push($leibiedata,$proone);

    $proone=array("title"=>"一级","detail1"=>"访问人数","num1"=>$yijinum,"detail2"=>"完播数量","num2"=>$yijiding,"detail3"=>"预估eCPM","num3"=>"30~200","detail4"=>"预估佣金","num4"=>$yijiyong);
    array_push($leibiedata,$proone);

    $proone=array("title"=>"二级","detail1"=>"访问人数","num1"=>"$erjinum","detail2"=>"完播数量","num2"=>$erjiding,"detail3"=>"预估eCPM","num3"=>"30~200","detail4"=>"预估佣金","num4"=>$erjiyong);
    array_push($leibiedata,$proone);
}
else
{
    if($procname=="状元评测")
    {
       $zituinum=0;$zituiding=0;$zituijin=0;$zituiyong=0;
       $yijinum=0;$yijiding=0;$yijijin=0;$yijiyong=0;
       $erjinum=0;$erjiding=0;$erjijin=0;$erjiyong=0;
       $datalist= array();
    }
    $proone=array("title"=>"自推","detail1"=>"访问人数","num1"=>$zituinum,"detail2"=>"成交单数","num2"=>$zituiding,"detail3"=>"成交金额","num3"=>$zituijin,"detail4"=>"成交佣金","num4"=>$zituiyong);
    array_push($leibiedata,$proone);

    $proone=array("title"=>"一级","detail1"=>"访问人数","num1"=>$yijinum,"detail2"=>"成交单数","num2"=>$yijiding,"detail3"=>"成交金额","num3"=>$yijijin,"detail4"=>"成交佣金","num4"=>$yijiyong);
    array_push($leibiedata,$proone);

    $proone=array("title"=>"二级","detail1"=>"访问人数","num1"=>"$erjinum","detail2"=>"成交单数","num2"=>$erjiding,"detail3"=>"成交金额","num3"=>$erjijin,"detail4"=>"成交佣金","num4"=>$erjiyong);
    array_push($leibiedata,$proone);
}
//$proone=array("title"=>"自推5","detail1"=>"访问人数","num1"=>"11","detail2"=>"成交单数","num2"=>"12","detail3"=>"成交金额","num3"=>"14","detail4"=>"成交佣金","num4"=>"100");
//array_push($leibiedata,$proone);
$result = array(
'status'=>"SUCCESS",
'Ishuiyuan'=>"0",
'leibiedata'=>$leibiedata,
'productlist'=>$productlist,
'leibielist'=>$douyinhaolist,
'datalist'=>$datalist,
'my_page' =>$my_page,
'data_page' =>$data_page,
'one_page' =>$one_page,
);

echo json_encode($result);


?>

