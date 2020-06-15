<!DOCTYPE html><html lang="zh-CN" style="font-size: 20.8px;width:100%;overflow-x:hidden;"><head style='width:100%;'><meta charset="utf-8">

<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0;" name="viewport" />


<title>收益报表</title>
<style>
hr {
    margin-top:7px;
    *margin: 0;
    border: 0;
    color: black;
    background-color: gray; 
    height: 1px
}

a {
	color:#fff;
	text-decoration:none;
}

</style>
</head>

<html>
<body style="background:#282938;color:#fff;">
<div width="100%" style="text-align:center;">
<span style="text-align:center;">收益报表</span>
<hr >
<?php 
if(isset($_GET['telephone'])){
	$telephone=$_GET['telephone'];
}
$database=$_GET['database'];
?>
<div style="font-size:15px;"><a href="myincome.php?telephone=<?php echo $telephone;?>&database=<?php echo $database;?>">个人收益</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="groupincome.php?telephone=<?php echo $telephone;?>&database=<?php echo $database;?>">一级代理</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="groupincome2.php?telephone=<?php echo $telephone;?>&database=<?php echo $database;?>">二级代理</a></div>
</div>
<hr style="height:0px;">
<?php
error_reporting(0); 

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
	echo "
	<script type='text/javascript'>

  window.location.href='login/login.html'          

</script>
	";
	
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
    $img=$row['img'];
	$dailiid=$row['dailiid'];
}
if(isset($_GET['telephone'])){
	$telephone=$_GET['telephone'];
}


?>
<div style="font-size:15px;">
<?php
error_reporting(0); 

session_start();

for($i=0;$i<11;$i++){


 $mysqli = new mysqli("127.0.0.1", "root", "root", "yunkehuslangfang");  
    if(!$mysqli)  {  
        echo"database error";  
    }else{  
        //echo"php env successful";  
    }  
    //$mysqli->close();

$mysqli->query('set names utf8;');





$sql = "SELECT * FROM `user` WHERE (fromwho='$dailiid') and fromwho!=''"; //SQL语句
$result = $mysqli->query($sql);  
$content="";
$date="today";
if(isset($_GET['date'])){
	$date=$_GET['date'];
}
$allcount=0.0;
while($row = $result->fetch_assoc()){ 
    $username=$row['username'];
    $telephone=$row['telephone'];
    $account=$row['account'];
    $bankcard=$row['bankcard'];
    $openbank=$row['openbank'];
    $fromwho=$row['from'];
    $img=$row['img'];
	$hisaccounttoday="";
	$dailiid2=$row['dailiid'];
	////////////////////////////////////////////jisuan 2 ji//////////////////////////////
	$sql2 = "SELECT * FROM `user` WHERE (fromwho='$dailiid2') and fromwho!=''"; //SQL语句
	$result2 = $mysqli->query($sql2);
	while($row2 = $result2->fetch_assoc()){ 

    $telephone2=$row2['telephone'];

	
	$mysqli1 = new mysqli("127.0.0.1", "root", "root", "wenda".$database);  
    if(!$mysqli1)  {  
        echo"database error";  
    }else{  
        //echo"php env successful";  
    }  

	$sql1 = "SELECT sum(cast(money as UNSIGNED INTEGER)) as moneys FROM `test` WHERE (fromid in (SELECT openid FROM `user` where telephone='$telephone2')) and TO_DAYS(NOW()) - TO_DAYS(testtime)=$i and pay_status='TRADE_SUCCESS'";
	if($i==8)
		$sql1 = "SELECT sum(cast(money as UNSIGNED INTEGER)) as moneys FROM `test` WHERE (fromid in (SELECT openid FROM `user` where telephone='$telephone2')) and DATE_FORMAT(testtime,'%Y%m')=DATE_FORMAT(CURDATE(),'%Y%m') and pay_status='TRADE_SUCCESS'";
	if($i==9)
		$sql1 = "SELECT sum(cast(money as UNSIGNED INTEGER)) as moneys FROM `test` WHERE (fromid in (SELECT openid FROM `user` where telephone='$telephone2')) and PERIOD_DIFF(date_format(now(),'%Y%m'),date_format(testtime,'%Y%m'))=1 and pay_status='TRADE_SUCCESS'";
	if($i==10)
		$sql1 = "SELECT sum(cast(money as UNSIGNED INTEGER)) as moneys FROM `test` WHERE (fromid in (SELECT openid FROM `user` where telephone='$telephone2')) and pay_status='TRADE_SUCCESS'";
	$result1 = $mysqli1->query($sql1);  
	while($row1 = $result1->fetch_assoc()){ 
		$hisaccounttoday=$row1['moneys']/100*0.05;
	}

	
	
	$finalaccount=$hisaccounttoday;

	$allcount=$allcount+$finalaccount;
	
	}

}			  
if($i==0){
	$time="今天";
}
else if($i==1){
	$time="昨天";
}
else if($i==2){
	$time="前天";
}
else if($i==8){
	$time="本月";
	echo "<hr>";
}
else if($i==9){
	$time="上月";
	echo "<hr>";
}
else if($i==10){
	$time="总共";
	echo "<hr>";
}
else
	$time=date("Y-m-d",strtotime('-'.$i.' day'));

$content= "<span style='font-weight:bold;'>$time"."</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='font-weight:bold;right:0px;position:absolute;color:#ffd400;'>&nbsp;&nbsp;&nbsp;&nbsp;¥ $allcount </span><br>
";
echo $content; 

}				
?>
</div>
</body>

</html>