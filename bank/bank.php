<?php
session_start();
$userid=$_SESSION['userid'];
$mysqli = new mysqli("127.0.0.1", "root", "root", "yunkehuslangfang");
if (!$mysqli) {
    echo "<script>alert('数据库连接失败！')</script>";
} else {
    
	if(!empty($_GET['banktype'])){  //如果不为空
        $banktype = stripslashes(trim($_GET['banktype']));
        $openbank = stripslashes(trim($_GET['openbank']));
		$bankcard = stripslashes(trim($_GET['bankcard']));
		$personname = stripslashes(trim($_GET['personname']));
		$areas = stripslashes(trim($_GET['area']));
    }

    if (empty($banktype)) {
        echo '银行类型不能为空';
        exit;
    }
    if (empty($openbank)) {
        echo '开户行不能为空';
        exit;
    }
    if (empty($bankcard)) {
        echo '银行卡号不能为空';
        exit;
    }
    if (empty($personname)) {
        echo '姓名不能为空';
        exit;
    }
    if (empty($areas)) {
        echo '地区不能为空';
        exit;
    }
    if (isset($banktype)) {
        $mysqli->query('set names utf8;');
        $sql = "UPDATE  `yunkehuslangfang`.`user` SET  `banktype` =  '$banktype',`openbank` =  '$openbank' ,`bankcard` =  '$bankcard',`personname` =  '$personname',`area` =  '$areas' WHERE  `user`.`userid` ='$userid';";
        $qid = $mysqli->query($sql);
        header("Location:index.php");
        
    }
}
?> 
