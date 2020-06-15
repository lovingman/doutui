<?php
header('content-type:application/json');
header('Access-Control-Allow-Origin:*'); // *代表允许任何网址请求
header('Access-Control-Allow-Methods:POST,GET,OPTIONS,DELETE'); // 允许请求的类型
header('Access-Control-Allow-Credentials: true'); // 设置是否允许发送 cookies
header('Access-Control-Allow-Headers: Content-Type,Content-Length,Accept-Encoding,X-Requested-with, Origin'); // 设置允许自定义请求头的字段

/**************************************************/
/*

{
	//平台总粉丝数
	"allfens": "15.64",
	//昨日视频播放总量
	"yesplay": "22.56",
	//排行榜列表 nickname:昵称 pic:头像 money:钱数
	"banglist": [{"nickname":"nickname0","pic":"pic0.png","money":"12.220"},{"nickname":"nickname1","pic":"pic1.png","money":"12.221"},{"nickname":"nickname2","pic":"pic2.png","money":"12.222"},{"nickname":"nickname3","pic":"pic3.png","money":"12.223"},{"nickname":"nickname4","pic":"pic4.png","money":"12.224"},{"nickname":"nickname5","pic":"pic5.png","money":"12.225"},{"nickname":"nickname6","pic":"pic6.png","money":"12.226"},{"nickname":"nickname7","pic":"pic7.png","money":"12.227"},{"nickname":"nickname8","pic":"pic8.png","money":"12.228"},{"nickname":"nickname9","pic":"pic9.png","money":"12.229"}],
	//个人页面
	"my_page": "my.php",
	//数据页面
	"data_page": "data.php",
	//首页页面
	"one_page": "one.php"
}




*/
/**************************************************/

//
$tmp=$num=mt_rand(0,100);
$allfens="15.21";
$yesplay=round(21.87+$tmp/10,2);

$my_page="my.php";
$data_page="data.php";
$one_page="one.php";

$money1=712.34+$tmp;
$banglist = array();
$bangone=array("nickname"=>"每日一撩","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2ec76000133aadc1fd099.jpeg","money"=>$money1);
array_push($banglist,$bangone);
$bangone=array("nickname"=>"星座说☞淘宝","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/2f4c70000327ee657133c.jpeg","money"=>"702.5");
array_push($banglist,$bangone);
$bangone=array("nickname"=>"布丁星座","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/30f780007a7507998a6ba.jpeg","money"=>"624.2");
array_push($banglist,$bangone);
$bangone=array("nickname"=>"邻家小妹","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2e69f0003b68dddc42885.jpeg","money"=>"552.1");
array_push($banglist,$bangone);
$bangone=array("nickname"=>"抖音文案馆","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/2f5940002f6c271b560a6.jpeg","money"=>"527.4");
array_push($banglist,$bangone);
$bangone=array("nickname"=>"智慧女生","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/2e4640000e3c140651842.jpeg","money"=>"472.6");
array_push($banglist,$bangone);
$bangone=array("nickname"=>"接好运","pic"=>"https://p9-dy-ipv6.byteimg.com/aweme/100x100/2f8990000aa462adb3c6d.jpeg","money"=>"423.1");
array_push($banglist,$bangone);
$bangone=array("nickname"=>"若情感工作室","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2ea36000472b79108db89.jpeg","money"=>"412.7");
array_push($banglist,$bangone);
$bangone=array("nickname"=>"趣味心理学","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/2e0200007dbd62e5348ef.jpeg","money"=>"316.2");
array_push($banglist,$bangone);
$bangone=array("nickname"=>"小丹情感励志","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2eb5d00070a6d2c98cc54.jpeg","money"=>"227.9");
array_push($banglist,$bangone);
$bangone=array("nickname"=>"抖音句馆","pic"=>"https://p26-dy.byteimg.com/aweme/100x100/31400000574c7f6283615.jpeg","money"=>"162.2");
array_push($banglist,$bangone);
$bangone=array("nickname"=>"龙姣 思维口才","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2de3c00072b5f2fb15976.jpeg","money"=>"117.9");
array_push($banglist,$bangone);


$banglist2 = array();
$bangone=array("nickname"=>"小情感","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2df8f0004b1e8107e7ea6.jpeg","money"=>"877.2");
array_push($banglist2,$bangone);
$bangone=array("nickname"=>"情感励志","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2eb5d00070a6d2c98cc54.jpeg","money"=>"812.5");
array_push($banglist2,$bangone);
$bangone=array("nickname"=>"忘记","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/3128500005d8121ef008a.jpeg","money"=>"753.2");
array_push($banglist2,$bangone);
$bangone=array("nickname"=>"第五人格","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/26edd000656b631c9db3f.jpeg","money"=>"721.1");
array_push($banglist2,$bangone);
$bangone=array("nickname"=>"抖音文案馆","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/2f5940002f6c271b560a6.jpeg","money"=>"623.4");
array_push($banglist2,$bangone);
$bangone=array("nickname"=>"电影收藏馆","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/fb7c0000ae0f8054caf3.jpeg","money"=>"611.6");
array_push($banglist2,$bangone);
$bangone=array("nickname"=>"网易云热评墙","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/241e1000062999238a26a.jpeg","money"=>"543.1");
array_push($banglist2,$bangone);
$bangone=array("nickname"=>"伤感音乐","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2e6120001c489bbbc1e5d.jpeg","money"=>"423.7");
array_push($banglist2,$bangone);
$bangone=array("nickname"=>"趣味心理学","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/2e0200007dbd62e5348ef.jpeg","money"=>"312.2");
array_push($banglist2,$bangone);
$bangone=array("nickname"=>"历史未解之谜","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2d111000414d77e285369.jpeg","money"=>"309.9");
array_push($banglist2,$bangone);
$bangone=array("nickname"=>"小品游戏","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/2ec150005c6afbdbf8518.jpeg","money"=>"234.2");
array_push($banglist2,$bangone);
$bangone=array("nickname"=>"女生小知识","pic"=>"https://p26-dy.byteimg.com/aweme/100x100/2ec840003615d63ffab91.jpeg","money"=>"211.9");
array_push($banglist2,$bangone);



$banglist3 = array();
$bangone=array("nickname"=>"酱酱小阿姨","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2ebf00006c997ca8cfe75.jpeg","money"=>"987.2");
array_push($banglist3,$bangone);
$bangone=array("nickname"=>"小幸运✨文字控","pic"=>"https://p1-dy.byteimg.com/aweme/100x100/2dbd00001d71bf30b5108.jpeg","money"=>"876.5");
array_push($banglist3,$bangone);
$bangone=array("nickname"=>"无影抖","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/2e9c000048a877dbed753.jpeg","money"=>"854.2");
array_push($banglist3,$bangone);
$bangone=array("nickname"=>"蓝昕微心理","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2f12d0000e7e4a12f8916.jpeg","money"=>"765.1");
array_push($banglist3,$bangone);
$bangone=array("nickname"=>"小吒儿","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/3129d0005b4b0ecedc5df.jpeg","money"=>"708.4");
array_push($banglist3,$bangone);
$bangone=array("nickname"=>"忙仔游戏世界","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/2e60900073f5948aeb962.jpeg","money"=>"698.6");
array_push($banglist3,$bangone);
$bangone=array("nickname"=>"吒儿妹妹","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/2e5030001ad417dc8c83c.jpeg","money"=>"667.1");
array_push($banglist3,$bangone);
$bangone=array("nickname"=>"2玩小游戏","pic"=>"https://p1-dy-ipv6.byteimg.com/aweme/100x100/2e5f20006a5a318e57767.jpeg","money"=>"603.7");
array_push($banglist3,$bangone);
$bangone=array("nickname"=>"趣味心理学","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/2e0200007dbd62e5348ef.jpeg","money"=>"521.2");
array_push($banglist3,$bangone);
$bangone=array("nickname"=>"动画工坊","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2e4b20000c1c6e57e2920.jpeg","money"=>"472.9");
array_push($banglist3,$bangone);
$bangone=array("nickname"=>"苦力娘","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2e65800040944fda9917c.jpeg","money"=>"323.2");
array_push($banglist3,$bangone);
$bangone=array("nickname"=>"我的世界","pic"=>"https://p26-dy.byteimg.com/aweme/100x100/3136c0002a1e5115399ec.jpeg","money"=>"162.9");
array_push($banglist3,$bangone);



$banglist4 = array();
$bangone=array("nickname"=>"手作生活","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/8ae40017371b2d5dfe22.jpeg","money"=>"987.2");
array_push($banglist4,$bangone);
$bangone=array("nickname"=>"消费日报","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/douyin-web-image/d194f5ecedf50dd2dd849e16e7df0ade.jpeg","money"=>"776.5");
array_push($banglist4,$bangone);
$bangone=array("nickname"=>"德音职场","pic"=>"https://p9-dy-ipv6.byteimg.com/aweme/100x100/2ec9100044ff55bced2f9.jpeg","money"=>"721.2");
array_push($banglist4,$bangone);
$bangone=array("nickname"=>"销售思维","pic"=>"https://p1-dy-ipv6.byteimg.com/aweme/100x100/2e4db0000bb2661a6198c.jpeg","money"=>"654.1");
array_push($banglist4,$bangone);
$bangone=array("nickname"=>"江北之声","pic"=>"https://p26-dy.byteimg.com/aweme/100x100/2d1d10006e2ba3e165537.jpeg","money"=>"610.4");
array_push($banglist4,$bangone);
$bangone=array("nickname"=>"电影收藏馆","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/fb7c0000ae0f8054caf3.jpeg","money"=>"524.6");
array_push($banglist4,$bangone);
$bangone=array("nickname"=>"网易云热评墙","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/241e1000062999238a26a.jpeg","money"=>"509.1");
array_push($banglist4,$bangone);
$bangone=array("nickname"=>"伤感音乐","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2e6120001c489bbbc1e5d.jpeg","money"=>"490.7");
array_push($banglist4,$bangone);
$bangone=array("nickname"=>"小黄人音乐榜","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/23f990003c6113d431c73.jpeg","money"=>"476.2");
array_push($banglist4,$bangone);
$bangone=array("nickname"=>"相声段子","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/3160800064f8bd6cf164e.jpeg","money"=>"465.9");
array_push($banglist4,$bangone);
$bangone=array("nickname"=>"科技战舰","pic"=>"https://p3-dy-ipv6.byteimg.com/aweme/100x100/313f40005fdf4d15b8b0b.jpeg","money"=>"382.2");
array_push($banglist4,$bangone);
$bangone=array("nickname"=>"马总名言","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/31664000424319206b6b2.jpeg","money"=>"278.9");
array_push($banglist4,$bangone);





$banglist5 = array();
$bangone=array("nickname"=>"音乐库","pic"=>"https://p3-dy-ipv6.byteimg.com/aweme/100x100/2ed3a00032fef6fd4fab9.jpeg","money"=>"1712.2");
array_push($banglist5,$bangone);
$bangone=array("nickname"=>"微观世界","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/3150a0003437e99737fe0.jpeg","money"=>"1521.5");
array_push($banglist5,$bangone);
$bangone=array("nickname"=>"趣味研究所","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2e0200007dbd62e5348ef.jpeg","money"=>"897.2");
array_push($banglist5,$bangone);
$bangone=array("nickname"=>"小艾说电影","pic"=>"https://p3-dy-ipv6.byteimg.com/aweme/100x100/2dbd200005eeda953ca20.jpeg","money"=>"824.1");
array_push($banglist5,$bangone);
$bangone=array("nickname"=>"奇闻异事说","pic"=>"https://p29-dy.byteimg.com/aweme/100x100/2d115000025091374ff76.jpeg","money"=>"765.4");
array_push($banglist5,$bangone);
$bangone=array("nickname"=>"电影收藏馆","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/fb7c0000ae0f8054caf3.jpeg","money"=>"722.6");
array_push($banglist5,$bangone);
$bangone=array("nickname"=>"网易云热评墙","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/241e1000062999238a26a.jpeg","money"=>"623.1");
array_push($banglist5,$bangone);
$bangone=array("nickname"=>"伤感音乐","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2e6120001c489bbbc1e5d.jpeg","money"=>"609.7");
array_push($banglist5,$bangone);
$bangone=array("nickname"=>"减压2020","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2e9ae0001fdf8044f24e7.jpeg","money"=>"572.2");
array_push($banglist5,$bangone);
$bangone=array("nickname"=>"音乐库","pic"=>"https://p3-dy-ipv6.byteimg.com/aweme/100x100/2ed3a00032fef6fd4fab9.jpeg","money"=>"471.9");
array_push($banglist5,$bangone);
$bangone=array("nickname"=>"科技战舰","pic"=>"https://p3-dy-ipv6.byteimg.com/aweme/100x100/313f40005fdf4d15b8b0b.jpeg","money"=>"415.2");
array_push($banglist5,$bangone);
$bangone=array("nickname"=>"新奇迹教育","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/1b4cf0004a43e21aab145.jpeg","money"=>"389.9");
array_push($banglist5,$bangone);




$banglist6 = array();
$bangone=array("nickname"=>"趣味心理学","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/2e0200007dbd62e5348ef.jpeg","money"=>"521.2");
array_push($banglist6,$bangone);
$bangone=array("nickname"=>"射手座的","pic"=>"https://p26-dy.byteimg.com/aweme/100x100/311ff0009c7f2944957eb.jpeg","money"=>"524.5");
array_push($banglist6,$bangone);
$bangone=array("nickname"=>"笑翻天","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2f8180003b60406860721.jpeg","money"=>"452.2");
array_push($banglist6,$bangone);
$bangone=array("nickname"=>"好玩的金刚","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/311120001c1e4dbebefc6.jpeg","money"=>"409.1");
array_push($banglist6,$bangone);
$bangone=array("nickname"=>"江北之声","pic"=>"https://p26-dy.byteimg.com/aweme/100x100/2d1d10006e2ba3e165537.jpeg","money"=>"400.4");
array_push($banglist6,$bangone);
$bangone=array("nickname"=>"电影收藏馆","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/fb7c0000ae0f8054caf3.jpeg","money"=>"387.6");
array_push($banglist6,$bangone);
$bangone=array("nickname"=>"熊孩子搞笑","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/312ee00072d7412ed7888.jpeg","money"=>"376.1");
array_push($banglist6,$bangone);
$bangone=array("nickname"=>"伤感音乐","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2e6120001c489bbbc1e5d.jpeg","money"=>"309.7");
array_push($banglist6,$bangone);
$bangone=array("nickname"=>"小黄人音乐榜","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/23f990003c6113d431c73.jpeg","money"=>"287.2");
array_push($banglist6,$bangone);
$bangone=array("nickname"=>"雯珏电商","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2dc4a0002c5e16a9ddda8.jpeg","money"=>"187.9");
array_push($banglist6,$bangone);
$bangone=array("nickname"=>"科技战舰","pic"=>"https://p3-dy-ipv6.byteimg.com/aweme/100x100/313f40005fdf4d15b8b0b.jpeg","money"=>"109.2");
array_push($banglist6,$bangone);
$bangone=array("nickname"=>"红人馆（卡卡）","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/31403000119880c8eb599.jpeg","money"=>"65.9");
array_push($banglist6,$bangone);




$banglist_video = array();
$bangone=array("nickname"=>"电影收藏馆","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/fb7c0000ae0f8054caf3.jpeg","money"=>"3002.6");
array_push($banglist_video,$bangone);
$bangone=array("nickname"=>"网易云热评墙","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/241e1000062999238a26a.jpeg","money"=>"2675.1");
array_push($banglist_video,$bangone);
$bangone=array("nickname"=>"伤感音乐","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2e6120001c489bbbc1e5d.jpeg","money"=>"2541.7");
array_push($banglist_video,$bangone);
$bangone=array("nickname"=>"减压2020","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2e9ae0001fdf8044f24e7.jpeg","money"=>"2511.2");
array_push($banglist_video,$bangone);
$bangone=array("nickname"=>"江北之声","pic"=>"https://p26-dy.byteimg.com/aweme/100x100/2d1d10006e2ba3e165537.jpeg","money"=>"1800.4");
array_push($banglist_video,$bangone);
$bangone=array("nickname"=>"电影收藏馆","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/fb7c0000ae0f8054caf3.jpeg","money"=>"1625.6");
array_push($banglist_video,$bangone);
$bangone=array("nickname"=>"熊孩子搞笑","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/312ee00072d7412ed7888.jpeg","money"=>"1524.1");
array_push($banglist_video,$bangone);
$bangone=array("nickname"=>"网易云热评墙","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/241e1000062999238a26a.jpeg","money"=>"1422.1");
array_push($banglist_video,$bangone);
$bangone=array("nickname"=>"伤感音乐","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2e6120001c489bbbc1e5d.jpeg","money"=>"1372.7");
array_push($banglist_video,$bangone);
$bangone=array("nickname"=>"减压2020","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2e9ae0001fdf8044f24e7.jpeg","money"=>"1221.2");
array_push($banglist_video,$bangone);
$bangone=array("nickname"=>"音乐库","pic"=>"https://p3-dy-ipv6.byteimg.com/aweme/100x100/2ed3a00032fef6fd4fab9.jpeg","money"=>"1027.9");
array_push($banglist_video,$bangone);
$bangone=array("nickname"=>"红人馆（卡卡）","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/31403000119880c8eb599.jpeg","money"=>"987.9");
array_push($banglist_video,$bangone);




$banglist_income = array();
$bangone=array("nickname"=>"王梓琳","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2ceda0000b526a3e8a4c7.jpeg","money"=>"15322.2");
array_push($banglist_income,$bangone);
$bangone=array("nickname"=>"射手座的","pic"=>"https://p26-dy.byteimg.com/aweme/100x100/311ff0009c7f2944957eb.jpeg","money"=>"13221.5");
array_push($banglist_income,$bangone);
$bangone=array("nickname"=>"笑翻天","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2f8180003b60406860721.jpeg","money"=>"11232.2");
array_push($banglist_income,$bangone);
$bangone=array("nickname"=>"小情感","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2df8f0004b1e8107e7ea6.jpeg","money"=>"10897.2");
array_push($banglist_income,$bangone);
$bangone=array("nickname"=>"情感励志","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/2eb5d00070a6d2c98cc54.jpeg","money"=>"10021.5");
array_push($banglist_income,$bangone);
$bangone=array("nickname"=>"忘记","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/3128500005d8121ef008a.jpeg","money"=>"9871.2");
array_push($banglist_income,$bangone);
$bangone=array("nickname"=>"第五人格","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/26edd000656b631c9db3f.jpeg","money"=>"9786.1");
array_push($banglist_income,$bangone);
$bangone=array("nickname"=>"抖音文案馆","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/2f5940002f6c271b560a6.jpeg","money"=>"9652.4");
array_push($banglist_income,$bangone);
$bangone=array("nickname"=>"电影收藏馆","pic"=>"https://p3-dy.byteimg.com/aweme/100x100/fb7c0000ae0f8054caf3.jpeg","money"=>"9512.6");
array_push($banglist_income,$bangone);
$bangone=array("nickname"=>"红人馆（卡卡）","pic"=>"https://p9-dy.byteimg.com/aweme/100x100/31403000119880c8eb599.jpeg","money"=>"8761.9");
array_push($banglist_income,$bangone);






$result = array(
'status'=>"SUCCESS",
'allfens'=>$allfens,
'yesplay'=>$yesplay,
'woyaoshangbang'=>"mydouyin.php",
'banglist' =>$banglist,
'banglist2' =>$banglist2,
'banglist3' =>$banglist3,
'banglist4' =>$banglist4,
'banglist5' =>$banglist5,
'banglist6' =>$banglist6,
'banglist_video' =>$banglist_video,
'banglist_income' =>$banglist_income,
'my_page' =>$my_page,
'data_page' =>$data_page,
'one_page' =>$one_page,
);

echo json_encode($result);


?>

