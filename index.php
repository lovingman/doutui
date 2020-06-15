<?php
error_reporting(0);
$appid = "wx552abc63f0f376c7";
//微信支付APPID
$code=$_GET['code'];





if($code=="" && strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')!==false){
	$redirect_uri=urlencode('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
	$url="https://open.weixin.qq.com/connect/oauth2/authorize?appid=".$appid."&redirect_uri=".$redirect_uri."&response_type=code&scope=snsapi_base&state=614#wechat_redirect";
	header('location:'.$url);
	
}





if($code!="" && (strpos($_SERVER['HTTP_USER_AGENT'],'MicroMessenger')!==false)) {
	//获取code
	"https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=fb60f3fc8432135e6b99af533dd2bcd0&code=".$code."&grant_type=authorization_code"."<br>";
	$weixin=file_get_contents("https://api.weixin.qq.com/sns/oauth2/access_token?appid=$appid&secret=fb60f3fc8432135e6b99af533dd2bcd0&code=".$code."&grant_type=authorization_code");
	//通过code换取网页授权access_token
	$jsondecode = json_decode(trim($weixin,chr(239).chr(187).chr(191)),true);
	$openid=$jsondecode['openid'];
	//输出openid
}
session_start();
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];
$mysqli = new mysqli("127.0.0.1", "root", "root", "yunkehuslangfang");
if(!$mysqli) {
	echo"database error";
} else {
	//echo"php env successful";
}
//$mysqli->close();
if($openid!="") {
	$mysqli->query('set names utf8;');
	$sql = "SELECT * FROM `user` WHERE wxopenid='".$openid."'";
	//SQL语句
	$result = $mysqli->query($sql);
	while($row = $result->fetch_assoc()) {
		$username=$row['username'];
		$telephone=$row['telephone'];
		$account=$row['account'];
		$bankcard=$row['bankcard'];
		$openbank=$row['openbank'];
		$dailiid=$row['dailiid'];
		$img=$row['img'];
		$userid=$row['userid'];
		$_SESSION['username']=$username;
		$_SESSION['userid']=$userid;
	}
}
if($userid=="") {
	echo "
	<script type='text/javascript'>
  window.location.href='login/login.html'          
</script>
	";
}
$mysqli->query('set names utf8;');
$sql = "SELECT * FROM `user` WHERE userid=".$userid."";
//SQL语句
$result = $mysqli->query($sql);
$data=array();
while($row = $result->fetch_assoc()) {
	$username=$row['username'];
	$telephone=$row['telephone'];
	$account=$row['account'];
	$bankcard=$row['bankcard'];
	$openbank=$row['openbank'];
	$dailiid=$row['dailiid'];
         $fromwho=$row['fromwho'];
	$img=$row['img'];
}
if($openid!="") {
	$sql = "UPDATE `user` set wxopenid='".$openid."' WHERE telephone='$telephone'";
	//SQL语句
	$result = $mysqli->query($sql);
}
if(strlen($dailiid)<2){
	//header("Location: joingrouppay1.php?telephone=$telephone&fromwho=$fromwho");
	header("Location: index.html");
}else{
	header("Location: index.html");
}
//echo $openid;
echo $userid;
//

?>