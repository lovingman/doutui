<html>
<head>

</head>
<body>
<?php
//2. 在生成的二维码中加上logo(生成图片文件)
function scerweima1($img,$url=''){
  require_once '../phpqrcode.php';
  $value = $url;         //二维码内容
  $errorCorrectionLevel = 'H';  //容错级别
  $matrixPointSize = 6;      //生成图片大小
  //生成二维码图片
  $filename = '../qrcode/'.microtime().'.png';
  QRcode::png($value,$filename , $errorCorrectionLevel, $matrixPointSize, 2);
  $logo = 'image/'.$img; //准备好的logo图片
  $QR = $filename;      //已经生成的原始二维码图
  if (file_exists($logo)) {
    $QR = imagecreatefromstring(file_get_contents($QR));    //目标图象连接资源。
    $logo = imagecreatefromstring(file_get_contents($logo));  //源图象连接资源。
    $QR_width = imagesx($QR);      //二维码图片宽度
    $QR_height = imagesy($QR);     //二维码图片高度
    $logo_width = imagesx($logo);    //logo图片宽度
    $logo_height = imagesy($logo);   //logo图片高度
    $logo_qr_width = $QR_width / 4;   //组合之后logo的宽度(占二维码的1/5)
    $scale = $logo_width/$logo_qr_width;  //logo的宽度缩放比(本身宽度/组合后的宽度)
    $logo_qr_height = $logo_height/$scale; //组合之后logo的高度
    $from_width = ($QR_width - $logo_qr_width) / 2;  //组合之后logo左上角所在坐标点
    //重新组合图片并调整大小
    /*
     * imagecopyresampled() 将一幅图像(源图象)中的一块正方形区域拷贝到另一个图像中
     */
    imagecopyresampled($logo, $QR, 60, 960, 0, 0, 280,280, $QR_width, $QR_height);
  }
  //输出图片
  $r=microtime();
  //imagepng($logo, 'qrcode/x'.$r.'.png');
  imagepng($logo, 'qrcode/x'.$r.'.png');
  imagedestroy($logo);
  imagedestroy($QR);
  return 'qrcode/x'.$r.'.png';
  //return '<img width=100% src="image/img1.jpg" alt="使用微信扫描支付">';
}
$dailiid=$_GET['dailiid'];
//调用查看结果
//echo scerweima1('http://www.coolfuture.xyz/lingxi/tui/login/yao.php?fromwho='.$dailiid);
$image1=scerweima1('img1.png','http://www.coolfuture.xyz/lingxi/dou/kehuslangfang/login/yao.php?fromwho='.$dailiid);
$image2=scerweima1('img2.png','http://www.coolfuture.xyz/lingxi/dou/kehuslangfang/login/yao.php?fromwho='.$dailiid);
$image3=scerweima1('img3.png','http://www.coolfuture.xyz/lingxi/dou/kehuslangfang/login/yao.php?fromwho='.$dailiid);
$image4=scerweima1('img4.png','http://www.coolfuture.xyz/lingxi/dou/kehuslangfang/login/yao.php?fromwho='.$dailiid);
$image5=scerweima1('img5.png','http://www.coolfuture.xyz/lingxi/dou/kehuslangfang/login/yao.php?fromwho='.$dailiid);



header("Location: index.php?image1=$image1&image2=$image2&image3=$image3&image4=$image4&image5=$image5");
//echo scerweima1('http://www.coolfuture.xyz/lingxi/dou/kehu19/joingrouppay1.php?telephone=15600896150&fromwho='.$dailiid);




?>
</body>
</html>
