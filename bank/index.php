<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>添加支付宝</title>
		<!-- 引入样式 -->
		<link rel="stylesheet" href="css/mint-ui.css">
		<link rel="stylesheet" href="css/common.css">
		<link rel="stylesheet" href="css/index.css">
	</head>
	<body>
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

  window.location.href='../login/login.html'          

</script>
	";
	
} 
$mysqli->query('set names utf8;');
$sql = "SELECT * FROM `user` WHERE userid=".$userid.""; //SQL语句
$result = $mysqli->query($sql);  
$data=array();
while($row = $result->fetch_assoc()){ 
    $banktype=$row['banktype'];
    $openbank=$row['openbank'];
    $bankcard=$row['bankcard'];
    $personname=$row['personname'];
    $area=$row['area'];
}
?>
		<div class="vueBox">
			<div class="msg-box">
				<div class="msg-item">
					<span class="msg-item-tit">收款方式</span>
					<div class="input-right" >
						<input name="banktype" value="支付宝" id="banktype" type="text"  readonly="" placeholder="支付宝">
						
					</div>
				</div>
			</div>
			<div class="msg-box">
				<div class="msg-item">
					<span class="msg-item-tit">个人/企业</span>
					<div class="input-right">
						<input name="openbank" value="个人" id="openbank" type="text"  readonly="" placeholder="个人">
						
					</div>
				</div>
			</div>
			<div class="msg-box">
				<div class="msg-item">
					<span class="msg-item-tit">支付宝账号</span>
					<div class="input-right">
					    
						<input name="bankcard" value="<?php echo $bankcard;?>" id="bankcard" type="text" placeholder="请输入支付宝账号">
					</div>
				</div>
			</div>
			<div class="msg-box">
				<div class="msg-item">
					<span class="msg-item-tit">支付宝姓名</span>
					<div class="input-right">
						<input name="personname" value="<?php echo $personname;?>" id="personname" type="text" placeholder="请输入收款支付宝姓名">
					</div>
				</div>
			</div>
			<div class="msg-box">
				<div class="msg-item">
					<span class="msg-item-tit">收款地区</span>
					<div class="input-right" @click="showCitys">
						<input name="areas" value="<?php echo $area;?>" id="areas" type="text"  :value="city_name" readonly="" placeholder="收款地区:<?php echo $area;?>">
							
					</div>
				</div>
			</div>
			<div class="div-btn">
				<div class="btn-submit" onclick="submitform();">保存</div>
			</div>

			<mt-popup v-model="bankVisible" position="bottom">
				<ul class="mint-popup-head">
					<li @click="selectBank(0)">取消</li>
					<li @click="selectBank(1)">确认</li>
				</ul>
				<mt-picker :slots="banks_list" @change="bankChange" value-key="name"> </mt-picker>
			</mt-popup>

			<mt-popup v-model="cityVisible" position="bottom">
				<ul class="mint-popup-head">
					<li @click="selectCity(0)">取消</li>
					<li @click="selectCity(1)">确认</li>
				</ul>
				<mt-picker :slots="citys_list" @change="cityChange" value-key="name"> </mt-picker>
			</mt-popup>

		</div>
		<script src="js/citys.js"></script>
		<script src="js/vue.min.2.5.13.js"></script>
		<!-- 引入组件库 -->
		<script src="js/mint-ui.js"></script>
		<script src="js/vue.index.js"></script>
		<script src="js/resize.js"></script>
	</body>
</html>
