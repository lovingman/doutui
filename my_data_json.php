<?php
header('content-type:application/json');
header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段

/**************************************************/
/*

{
	//是否是代理,1:是 0:否
	"isdaili": 1,
	//加入代理链接
	"joindaili_link": "joingroup.php",
	//zhaomulink
	"zhaomu_link": "erweima.php?dailiid=6150",
	//邀请人数
	'yaonum'=>$yaonum,
	//一级总收益
	'allcount1'=>$allcount1,
	//二级总收益
	'allcount2'=>$allcount2,
	//昵称
	"username": "\u730e\u4fe1\u6570\u636e\u79d1\u6280\u6709\u9650\u516c\u53f8",
	//微信
	"wechat": "wechat",
	//公众号
	"gongzhonghao": "gongzhonghao.png",
	//logo
	"logo": "logo.png",
	//专属客服
	"kefu_link":"kefu.jpg"
	//我的抖音
	"mydouyin_link":"mydouyin.php"
	//邀请码
	"dailiid": "6150",
	//推广或招募代理链接
	"tuiguang_link": "erweima.php?dailiid=6150",
	//头像图片地址
	"img": "https:\/\/p9-dy.byteimg.com\/aweme\/100x100\/171ef00053d35e84d1e53.jpeg",
	//手机号
	"telephone": "15600896150",
	//可提现余额
	"accountyue": 0.040000000000000036,
	//总收入
	"accountall": 0.84000000000000008,
	//今日收入
	"accounttoday": 0,
	//昨日收入
	"account": 0,
	//绑定收款链接
	"bank_link": "bank\/index.php",
	//绑定抖音链接
	"bind_link": "bind.png",
	//收益报表链接
	"myincome_link": "myincome.php",
	//商务合作链接
	"hezuo_link": "hezuo.php",
	//系统通知链接
	"notify_link": "notify.php",
	//投诉建议链接
	"tousu_link": "tousu.php",
	//关于我们链接
	"about_link": "about.php",
	//系统设置链接
	"sysset_link": "set.php",
	//头像列表
	"imglist": ["http:\/\/sf1-ttcdn-tos.pstatp.com\/img\/mosaic-legacy\/3795\/3044413937~120x256.image", "https:\/\/p9-dy.byteimg.com\/aweme\/100x100\/2e9be0004cf650cda6862.jpeg", "https:\/\/p3-dy.byteimg.com\/aweme\/100x100\/2e9be0004cf650cda6862.jpeg", "https:\/\/p9-dy.byteimg.com\/aweme\/100x100\/171ef00053d35e84d1e53.jpeg"],
	//个人页面
	"my_page": "my.php",
	//数据页面
	"data_page": "data.php",
	//首页页面
	"one_page": "one.php"
}




*/
/**************************************************/
error_reporting(0); 
session_start();
$username=$_SESSION['username'];
$userid=$_SESSION['userid'];
$updatetext="升级";
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
$updatetext="登录";
} 
$mysqli->query('set names utf8;');
$sql = "SELECT * FROM `user` WHERE userid=".$userid.""; //SQL语句
$result = $mysqli->query($sql);  
$data=array();
$classify="爆破";
while($row = $result->fetch_assoc()){ 
    $username=$row['username'];
    $telephone=$row['telephone'];
    $account=$row['account'];
    $bankcard=$row['bankcard'];
    $openbank=$row['openbank'];
	$dailiid=$row['dailiid'];
    $img=$row['img'];
    $classify=$row['classify'];
}
$isbindshoukuan="0";
if($bankcard!=""){
$isbindshoukuan="1";
}


$mytelephone=$telephone;
$dusername="自己";
$dtelephone="";
$sql = "SELECT * FROM `user` WHERE dailiid=".$fromid.""; //SQL语句
$result = $mysqli->query($sql);  
if($result>0){
while($row = $result->fetch_assoc()){ 
    $dusername=$row['username'];
    $dtelephone=$row['telephone'];
    $daccount=$row['account'];
    $dbankcard=$row['bankcard'];
    $dopenbank=$row['openbank'];
	$dfromid=$row['fromid'];
    $ddailiid=$row['dailiid'];

}
}


////////////////////////////////////计算1级人数///////////////////////////////////
$yaonum=0;
$yaonum1=0;
$yaonum2=0;
$yaonum3=0;
/*
$sql = "SELECT count(distinct(telephone)) as num FROM `user` WHERE (fromwho='$dailiid') and dailiid!='' and classify='爆破手'"; //SQL语句
$result = $mysqli->query($sql);  
while($row = $result->fetch_assoc()){ 
	$yaonum1=$row['num'];
}
$sql = "SELECT count(distinct(telephone)) as num FROM `user` WHERE (fromwho='$dailiid') and dailiid!='' and classify='爆破长'"; //SQL语句
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        $yaonum2=$row['num'];
}
$sql = "SELECT count(distinct(telephone)) as num FROM `user` WHERE (fromwho='$dailiid') and dailiid!='' and classify='爆破王'"; //SQL语句
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        $yaonum3=$row['num'];
}
$yaonum=0;
*/
$sql = "SELECT IFNULL(sum(money),0) as num FROM `payrecord` WHERE (fromid='$telephone') and classify='yao' and pay_status='TRADE_SUCCESS'"; //SQL语句
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        $yaonum=$row['num'];
}

//$yaonum=50*$yaonum1+150*$yaonum2+500*$yaonum3;
///////////////////////////////////////计算1级代理////////////////////////////////	

$sql = "SELECT IFNULL(sum(money),0) as num FROM `payrecord` WHERE (fromid='$telephone') and classify='yiji' and pay_status='TRADE_SUCCESS'"; //SQL语句
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        $allcount1=$row['num'];
}

///////////////////////////////////////计算2级代理////////////////////////////////	

$sql = "SELECT IFNULL(sum(money),0) as num FROM `payrecord` WHERE (fromid='$telephone') and classify='erji' and pay_status='TRADE_SUCCESS'"; //SQL语句
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        $allcount2=$row['num'];
}


$allcount12=$allcount1+$allcount2;	

///////////////////////////////////////计算个人收入/////////////////////////////////////
////////////////昨天////////////////

$sql = "SELECT IFNULL(sum(money),0) as num FROM `payrecord` WHERE (fromid='$telephone') and classify!='yao' and (TO_DAYS(NOW()) - TO_DAYS(`testtime`))=1 and pay_status='TRADE_SUCCESS'"; //SQL语句
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        $accountyes=$row['num'];
}

////////////////今天////////////////

$sql = "SELECT IFNULL(sum(money),0) as num FROM `payrecord` WHERE (fromid='$telephone') and classify!='yao' and (TO_DAYS(NOW()) - TO_DAYS(`testtime`))<=0 and pay_status='TRADE_SUCCESS'"; //SQL语句
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        $accounttoday=$row['num'];
}


////////////////所有////////////////

$sql = "SELECT IFNULL(sum(money),0) as num FROM `payrecord` WHERE (fromid='$telephone') and classify!='yao' and pay_status='TRADE_SUCCESS'"; //SQL语句
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()){
        $accountall=$row['num'];
}

////////////////付款////////////////
$accountyue=$accountall;
$accounpayed=0.0;
$sql = "SELECT sum(cast(money as DECIMAL(10,3))) as moneys FROM `yunkehuslangfang`.`pay` WHERE telephone='$mytelephone' and ispay=1";
$result = $mysqli->query($sql);  
$data=array();
$accounpayed=0;
while($row = $result->fetch_assoc()){ 
    $accounpayed=$accounpayed+$row['moneys'];
}

$accountyue=$accountall-($accounpayed*100);





//////////////////////////////////////头像//////////////////////////////////////////
/*
$sql = "SELECT * FROM `wenda`.`user` WHERE `wenda`.`user`.`telephone`=".$mytelephone.""; //SQL语句
$result = $mysqli->query($sql);  
$data=array();
while($row = $result->fetch_assoc()){ 
    $img=$row['img'];
}
*/
if($img=="")
	$img="images/user-logo.png";
else
{
    $img="http://baopeng.chaopaikeji.com/baopeng/uploadimg/".$img;
}



$accountyue100=round($accountyue/100+$yaonum,2);//100%打款额度	
$accountyue=round($accountyue/100+$yaonum,2);//可提现余额	
$accountall=round($accountall/100,2);//	总收益(元)
$accounttoday=round($accounttoday/100,2);//今日收益(元)
$accountyes=round($accountyes/100,2);//昨日收益(元)

$allcount1=round($allcount1/100,2);
$allcount2=round($allcount2/100,2);




//
$my_page="my.php";
$data_page="data.php";
$one_page="one.php";

$douyinhaolist = array();
$proone=array("shengjijibie"=>"爆破手","shengjiurl"=>"http://www.coolfuture.xyz/lingxi/dou/wxpay19re.php?telephone=".$mytelephone);
array_push($douyinhaolist,$proone);
$proone=array("shengjijibie"=>"爆破长","shengjiurl"=>"http://www.coolfuture.xyz/lingxi/dou/wxpay19_299re.php?telephone=".$mytelephone);
array_push($douyinhaolist,$proone);
$proone=array("shengjijibie"=>"爆破王","shengjiurl"=>"http://www.coolfuture.xyz/lingxi/dou/wxpay19_999re.php?telephone=".$mytelephone);
array_push($douyinhaolist,$proone);

$zhaomulist = array();
$proone=array("zhaomujibie"=>"爆破长","zhaomuurl"=>"erweima299.php?dailiid=".$dailiid);
array_push($zhaomulist,$proone);
$proone=array("zhaomujibie"=>"爆破王","zhaomuurl"=>"erweima999.php?dailiid=".$dailiid);
array_push($zhaomulist,$proone);
$proone=array("zhaomujibie"=>"爆破手","zhaomuurl"=>"erweima.php?dailiid=".$dailiid);
array_push($zhaomulist,$proone);


$dou=$username;
$result = array(
'status'=>"SUCCESS",
'isdaili'=>"1",
'isbindshoukuan'=>$isbindshoukuan,
'huiyuanjibie'=>$classify,
//"huiyuanjibie"=>"爆破手",
'huiyuanshengji'=>$douyinhaolist,
'zhaomulist'=>$zhaomulist,
'yaonum'=>$yaonum,
'allcount1'=>$allcount1,
'allcount2'=>$allcount2,
'username'=>$username,
'wechat'=>$dou,
'dailiid'=>$dailiid,
'img'=>$img,
'telephone'=>$mytelephone,
'accountyue'=>$accountyue,
'accountyue100'=>$accountyue100,
'accountall'=>$accountall,
'accounttoday'=>$accounttoday,
'account'=>$accountyes,
'gongzhonghao'=>'pic/gongzhonghao.png',
'kefu_link'=>'zhuanshukefu.html',
'set_link'=>'set.php',
'mydouyin_link'=>'mydouyin.php',
'bank_link'=>"bank/index.php",
'myincome_link'=>"income.php",
'hezuo_link'=>"shangwuhezuo.html",
'zhaomu_link'=>"erweima/erweima.php?dailiid=".$dailiid,
'tousu_link'=>"tousujianyi.html",
'sysset_link'=>"set.php",
'edit'=>'mydouyin.php',
'my_page' =>$my_page,
'data_page' =>$data_page,
'one_page' =>$one_page,
'updatetext'=>$updatetext,
'login_link'=>"login/login.html",
'editpw_link'=>"login/editpw.php",
'exit_link'=>"login/exit.php",
);
echo json_encode($result);


?>

