<?php
session_start();
$mysqli = new mysqli("127.0.0.1", "root", "root", "yunkehuslangfang");
if (!$mysqli) {
    echo "<script>alert('数据库连接失败！')</script>";
} else {
    
	if(!empty($_POST['username'])){  //如果不为空
        $username = stripslashes(trim($_POST['username']));
        $phone1 = stripslashes(trim($_POST['phone1']));
        $pass1 = stripslashes(trim($_POST['pass1']));
	$from = stripslashes(trim($_POST['from']));
    }
	if(!empty($_GET['username'])){  //如果不为空
        $username = stripslashes(trim($_GET['username']));
        $phone1 = stripslashes(trim($_GET['phone1']));
        $pass1 = stripslashes(trim($_GET['pass1']));
	$from = stripslashes(trim($_GET['from']));
    }

    if (empty($username)) {
        echo '用户名不能为空';
        exit;
    }
    if (empty($phone1)) {
        echo '手机号不能为空';
        exit;
    }
    if (empty($pass1)) {
        echo '密码不能为空';
        exit;
    }
    if (isset($username)) {
        $mysqli->query('set names utf8;');
        $username = preg_replace('/[\x{10000}-\x{10FFFF}]/u', '', $username) ;
        $dailiid=substr($phone1,-4); 
        $sqls = "INSERT INTO `user` (`username`, `userpass`, `telephone`, `fromwho`, `dailiid`) VALUES ('".$username."', '".$pass1."', '".$phone1."', '".$from."', '".$dailiid."');"; //SQL璇彞
        $results = $mysqli->query($sqls);
        echo "<script>alert('注册成功!')</script>";
        header("Location:login.html?model=" . $model);
        
    }
}



?> 
