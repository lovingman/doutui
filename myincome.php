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

<div style="font-size:15px;">
<?php
error_reporting(0); 


session_start();
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];

if($userid==""){
        echo "
        <script type='text/javascript'>

  window.location.href='login/login.html'          

</script>
        ";

}
 $mysqli = new mysqli("127.0.0.1", "root", "root", "wenda".$database);  
    if(!$mysqli)  {  
        echo"database error";  
    }else{  
        //echo"php env successful";  
    }  
    //$mysqli->close();


$mysqli->query('set names utf8;');

 $mysqli1 = new mysqli("127.0.0.1", "root", "root", "yunkehuslangfang");  
    if(!$mysqli1)  {  
        echo"database error";  
    }else{  
        //echo"php env successful";  
    }  
    //$mysqli->close();
$sql1 = "SELECT * from user where userid='$userid'";
    $result1 = $mysqli1->query($sql1); 
    while($row1 = $result1->fetch_assoc()){ 
		$telephone=$row1['telephone'];
		$dailiid=$row1['dailiid'];
		
	}

$mysqli1->query('set names utf8;');

//$date=$_GET('dates');
if(isset($_GET['date'])){
	$date=$_GET['date'];
}
else{
	$date=date("Y-m-d");
}
?>

<h1>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="input"  value="<?php echo $date; ?>" style="width:120px;height:34px;border-radius:15px;font-size:20px;"  id="pickdate"/>&nbsp;&nbsp;<a href="#" onclick="gotodate();">查询</a></h1>   

<?php
$fromtime=$date." 00:00:00";
$totime=$date." 23:59:59";
$sql = "SELECT * from test where pay_status='TRADE_SUCCESS' and testtime>'$fromtime' and testtime<'$totime' and fromid in (select openid from user where telephone='$telephone') order by testtime desc";

$result = $mysqli->query($sql); 

while($row = $result->fetch_assoc()){ 

	$nickname=$row['nickname'];
	$timuid=$row['timuid'];
	$money=$row['money']/100;
	$fromid=$row['fromid'];
	$testtime=$row['testtime'];

	$sql1 = "SELECT nickname,img from user where openid='$fromid'";
    $result1 = $mysqli->query($sql1); 
    while($row1 = $result1->fetch_assoc()){ 
		$fnickname=$row1['nickname'];
		$img=$row1['img'];
		
	}
	$sql1 = "SELECT name from timu where timuid='$timuid'";
    $result1 = $mysqli->query($sql1); 
    while($row1 = $result1->fetch_assoc()){ 
		$name=$row1['name'];
		
	}
	
echo "<a title='$nickname'>我的</a> 支付#$name  <a style='font-weight:bold;font-size:25px;'>¥$money</a> <br>$testtime      来源 <img src='$img' style='border-radius:10px;' width='20px;' />$fnickname<hr>";
}


?>	

</div>
<script>

function gotodate(){
	var dates=document.getElementById('pickdate').value;
	location.href = 'myincome.php?date='+dates;
}
</script>
</body>

</html>
