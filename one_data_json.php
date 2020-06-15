<?php
header('content-type:application/json');
header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段
/**************************************************/
/*

      myData: {

		//人脉圈链接
        renmai_link: "https://star.toutiao.com/mobile/sup/login",
        //商学院链接
        shangxueyuan_link: "https://m.lizhiweike.com/indexpage?from=menu&_pwk=1",
        //我的抖音号链接
        mydouyin_link: "mydouyin.php",
        //每日咨询链接
        meirizixun_link: "http://api.woshipm.com/search/list.html?key=%E6%8A%96%E9%9F%B3&reffer=http%3A%2F%2Fwww.woshipm.com%2F",
		//视频学习链接
        shipinxuexi_link: "https://m.lizhiweike.com/channel2/238046?version=new",
        //分享会链接
        fenxianghui_link: "https://m.lizhiweike.com/indexpage/more-liveroom?keyword=%E7%9F%AD%E8%A7%86%E9%A2%91",
        //会员群链接
        huiyuanqun_link: "huiyanqun.php",
        
        //产品列表 proname:产品名称 propic:产品图片 prodescribe:产品介绍 protuiguangma:产品推广码 prochanpinshuoming:产品说明 prochakanshouyi:查看收益
        productlist_yuanfen: [
          {
            proname: "测试你和他的契合度",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          },
          {
            proname: "\u6d4b\u6d4b\u4f60\u5bf9\u7231\u60c5\u7684\u6001\u5ea6",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          },
          {
            proname: "\u6d4b\u6d4b\u4f60\u5bf9\u7231\u60c5\u7684\u6001\u5ea6",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          }
        ],productlist_xinli: [
          {
            proname: "测试你和他的契合度",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          },
          {
            proname: "\u6d4b\u6d4b\u4f60\u5bf9\u7231\u60c5\u7684\u6001\u5ea6",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          },
          {
            proname: "\u6d4b\u6d4b\u4f60\u5bf9\u7231\u60c5\u7684\u6001\u5ea6",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          }
        ],
		,productlist_yanzhi: [
          {
            proname: "测试你和他的契合度",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          },
          {
            proname: "\u6d4b\u6d4b\u4f60\u5bf9\u7231\u60c5\u7684\u6001\u5ea6",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          },
          {
            proname: "\u6d4b\u6d4b\u4f60\u5bf9\u7231\u60c5\u7684\u6001\u5ea6",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          }
        ],productlist_laozhaopian: [
          {
            proname: "测试你和他的契合度",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          },
          {
            proname: "\u6d4b\u6d4b\u4f60\u5bf9\u7231\u60c5\u7684\u6001\u5ea6",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          },
          {
            proname: "\u6d4b\u6d4b\u4f60\u5bf9\u7231\u60c5\u7684\u6001\u5ea6",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          }
        ],productlist_zhishi: [
          {
            proname: "测试你和他的契合度",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          },
          {
            proname: "\u6d4b\u6d4b\u4f60\u5bf9\u7231\u60c5\u7684\u6001\u5ea6",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          },
          {
            proname: "\u6d4b\u6d4b\u4f60\u5bf9\u7231\u60c5\u7684\u6001\u5ea6",
            propic:require("../assets/images/l-img1.png"),
            prodescribe:"测试你和他的契合度",
            protuiguangma: "xiaochengxu.png",
            prochanpinshuoming: "jieshao.jpg",
            prochakanshouyi: "income.php"
          }
        ],
        //个人页面
        my_page: "my.php",
        //数据页面
        data_page: "data.php",
        //首页页面
        one_page: "one.php"
      }



*/
/**************************************************/

//
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
/*
$result = array(
'status'=>"SUCCESS",
'tips'=>"notlogin"
);
echo json_encode($result);
*/
$userid=1;
$Ishuiyuan="2";	
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
    $classify=$row['classify'];
}
$sql2 = "SELECT round(bilizitui*100) as bili1,round(biliyiji*100) as bili2,round(bilierji*100) as bili3 FROM `basemoney` WHERE classifyname='".$classify."'"; //SQL语句
$result2 = $mysqli->query($sql2);
$bili1=0;
$bili2=0;
$bili3=0;
while($row = $result2->fetch_assoc()){
    $bili1=$row['bili1'];
    $bili2=$row['bili2'];
    $bili3=$row['bili3'];
}

if($Ishuiyuan!="2")
{
if($dailiid!="")
	$Ishuiyuan="1";
else{
	$Ishuiyuan="0";
}
}



$my_page="my.php";
$data_page="data.php";
$one_page="one.php";



$productlist = array();
///////////////////////////////////心理测试题目列表////////////////////////////////////////////

$productlist_xinli = array();
$mysqli = new mysqli("127.0.0.1", "root", "root", "wenda");  
    if(!$mysqli)  {  
        echo"database error";  
    }else{  
        //echo"php env successful";  
    }  
$mysqli->query('set names utf8;');
$sql = "SELECT timuid,name,listPicture,shortDescribe FROM `timu` WHERE timuid>0"; //SQL语句
$result = $mysqli->query($sql);  
while($row = $result->fetch_assoc()){ 
    $timuid=$row['timuid'];
	$name=$row['name'];
	$introPicture="http://www.coolfuture.xyz/lingxi/xinadmin456/upload/".$row['listPicture'];
	$shortDescribe=$row['shortDescribe'];
	
	
	$proone=array("zi_proname"=>$name,"zi_propic"=>$introPicture,"zi_prodescribe"=>$shortDescribe,"zi_protuiguangma"=>"xiaochengxu.jpg","zi_prochanpinshuoming"=>"jieshao.jpg","zi_prochakanshouyi"=>"income.php");
	array_push($productlist_xinli,$proone);
}

$linkxinli="income_xinliceshi.php?bili1=".$bili1."&bili2=".$bili2."&bili3=".$bili3;
$pro=array("proname"=>"心理测试","protype"=>"评测","Detaillink"=>$linkxinli,"propic"=>"pic/xinliceshi.png","prodescribe"=>"整合多款心理评测，潜能挖掘、爱情匹配、性格扫描、潜意识探测等测试模块。","maxincome"=>"15242.3","perincome"=>"100%","zinum"=>"16","protuiguangma"=>"pic/xiaochengxu_xinli.jpg","prochanpinshuoming"=>"pic/jieshao_xinli.jpg","prochakanshouyi"=>"income_xinliceshi.php","zi_productlist"=>$productlist_xinli);

array_push($productlist,$pro);

////////////////////常见问题///////////////////////
$changjianwenti= array();
$q1=array("question"=>"为什么我视频挂了小程序没有收益","answer"=>"1、小程序没有按流程绑定;2、抖音号没有授权;3、打开小程序时还在加载中，就着急拍视频的都有可能没有收益;");
array_push($changjianwenti,$q1);
$q2=array("question"=>"怎么授权抖音号和抖音怎么绑定小程序？","answer"=>"先点击绑定抖音,然后下载二维码,用抖音扫码之后,输入注册平台的手机号进行绑定,每个小程序要单独绑定");
array_push($changjianwenti,$q2);
$q3=array("question"=>"视频中小程序链接掉了","answer"=>"小程序会掉链接是因为拍摄的视频内容和小程序不相关,建议优化视频内容,贴近小程序内容");
array_push($changjianwenti,$q3);
$q3=array("question"=>"如何招募代理","answer"=>"进入个人中心,点击招募代理,把海报分享给别人注册,按照操作进行就可以了");
array_push($changjianwenti,$q3);
$q3=array("question"=>"可以绑定几个抖音号","answer"=>"可以绑定无限多个,只要执行绑定操作步骤,输入正确的手机号码就可以");
array_push($changjianwenti,$q3);
////////////////////平台公告///////////////////////

$jibenyaoqiu=array("time"=>"2020-05-14","title"=>"小程序推广基本要求","content"=>"我们的使命和价值观是希望帮助更多的短视频创作者提供变现产品，能够轻松创业，通过自己的努力，多一点收入改善生活！希望各个团队要多正向宣传我们的使命和价值观。严禁宣传诸如一夜暴富，躺赚，日入过万，月入百万，年入千万等话术；严禁夸大宣传，使用不当手段去宣传；严禁公开晒佣金制度；严禁公开晒大额收益与大额提现截图或视频（日收益超过5000以上都不要再晒了）；并请大家相互转告和相互监督！");

$xinshou= array();
$q1=array("title"=>"为什么我视频挂了小程序没有收益","answer"=>"http://baopeng.chaopaikeji.com/baopeng/PS.mp4");
array_push($xinshou,$q1);
$q2=array("title"=>"怎么授权抖音号和抖音怎么绑定小程序？","answer"=>"http://baopeng.chaopaikeji.com/baopeng/Word.mp4");
array_push($xinshou,$q2);
$q3=array("title"=>"视频中小程序链接掉了","answer"=>"http://baopeng.chaopaikeji.com/baopeng/PS.mp4");
array_push($xinshou,$q3);

$douyinhaolist = array();
$proone=array("shengjijibie"=>"爆破手","shengjiurl"=>"http://www.coolfuture.xyz/lingxi/dou/wxpay19re.php?telephone=".$mytelephone);
array_push($douyinhaolist,$proone);
$proone=array("shengjijibie"=>"爆破长","shengjiurl"=>"http://www.coolfuture.xyz/lingxi/dou/wxpay19_299re.php?telephone=".$mytelephone);
array_push($douyinhaolist,$proone);
$proone=array("shengjijibie"=>"爆破王","shengjiurl"=>"http://www.coolfuture.xyz/lingxi/dou/wxpay19_999re.php?telephone=".$mytelephone);
array_push($douyinhaolist,$proone);

///////////////////////////////////////////////////////////////////////////////////////////////////////
$result = array(
'status'=>"SUCCESS",
'Ishuiyuan'=>$Ishuiyuan,
'pingtaigonggao'=>"小程序推广基本要求",
'renmai_link'=>'https://star.toutiao.com/mobile/sup/login',
'shangxueyuan_link'=>'https://m.lizhiweike.com/indexpage?from=menu&_pwk=1',
'mydouyin_link'=>'mydouyin.php',
'meirizixun_link'=>'http://api.woshipm.com/search/list.html?key=%E6%8A%96%E9%9F%B3&reffer=http%3A%2F%2Fwww.woshipm.com%2F',
'shipinxuexi_link'=>'https://m.lizhiweike.com/channel2/238046?version=new',
'shipinshangdian_link'=>'https://m.lizhiweike.com/liveroom2/23998378',
'fenxianghui_link'=>'https://m.lizhiweike.com/indexpage/more-liveroom?keyword=%E7%9F%AD%E8%A7%86%E9%A2%91',
'huiyuanqun_link'=>'pic/huiyuanqun.jpg',
'kaitong_link'=>'../wxpay11.php?telephone='.$telephone,
'totalpro'=>'35',
'productlist'=>$productlist,
//'productlist_xinli' =>$productlist_xinli,
//'productlist_yuanfen' =>$productlist_yuanfen,
//'productlist_zhishi' =>$productlist_zhishi,
'changjianwenti'=>$changjianwenti,
'jibenyaoqiu'=>$jibenyaoqiu,
'my_page' =>$my_page,
'data_page' =>$data_page,
'one_page' =>$one_page,
'lunbourl1'=>'mydouyin.php',
'xinshoujiaocheng'=>$xinshou,
'huiyuanshengji'=>$douyinhaolist
);

echo json_encode($result);


?>

