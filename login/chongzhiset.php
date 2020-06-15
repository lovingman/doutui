<?php
session_start();
$mysqli = new mysqli("127.0.0.1", "root", "root", "yunkehuslangfang");
if (!$mysqli) {
    echo "<script>alert('数据库连接失败！')</script>";
} else {
    
	if(!empty($_POST['phone1'])){  //如果不为空
        $username = stripslashes(trim($_POST['username']));
        $phone1 = stripslashes(trim($_POST['phone1']));
        $pass1 = stripslashes(trim($_POST['pass1']));
	$from = stripslashes(trim($_POST['from']));
    }
	if(!empty($_GET['phone1'])){  //如果不为空
        $username = stripslashes(trim($_GET['username']));
        $phone1 = stripslashes(trim($_GET['phone1']));
        $pass1 = stripslashes(trim($_GET['pass1']));
	$from = stripslashes(trim($_GET['from']));
    }


    if (empty($phone1)) {
        echo '手机号不能为空';
        exit;
    }
    if (empty($pass1)) {
        echo '密码不能为空';
        exit;
    }
    if (isset($phone1)) {
        $mysqli->query('set names utf8;');
        $username = preg_replace('/[\x{10000}-\x{10FFFF}]/u', '', $username) ;
        $dailiid=substr($phone1,7,4);
	$sqls = "UPDATE `user` set userpass='$pass1' where telephone='$phone1';"; //SQL璇彞
        $results = $mysqli->query($sqls);
        if($results>0)
            echo "<script>alert('重置成功!".$results."')</script>";
        else
	   echo "<script>alert('该手机号已经重置!')</script>";
        header("Location:login.html?model=" . $model);
        
    }
}



?> 
