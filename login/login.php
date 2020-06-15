<?php
session_start();
$mysqli = new mysqli("127.0.0.1", "root", "root", "yunkehuslangfang");
if (!$mysqli) {
    echo "<script>alert('数据库连接失败！')</script>";
} else {
    
	if(!empty($_POST['telephone'])){  //如果不为空
        $telephone = stripslashes(trim($_POST['telephone']));
        $pass = stripslashes(trim($_POST['password']));
    }

    if (empty($telephone)) {
        echo '用户名不能为空';
        exit;
    }
    if (empty($pass)) {
        echo '密码不能为空';
        exit;
    }
    if (isset($telephone)) {
        $mysqli->query('set names utf8;');
        $sql = "select userid,userpass,username from user where telephone='$telephone'";
        $qid = $mysqli->query($sql);
        $row = $qid->fetch_row();
        //$ps = $us ? $md5pass == $row['password'] : FALSE;
        if ($pass == stripslashes(trim($row[1]))) {
            $rs = true;
            if ($rs) {
                $userid = $row[0];
                $username = $row[2];
                $_SESSION['username']=$username;
                $_SESSION['userid']=$userid;
                header("Location:../index.php");
            } else {
                $arr['success'] = 0;
                $arr['msg'] = '登录失败';
            }
        } else {
            $arr['success'] = 0;
            $arr['msg'] = '用户名或密码错误！';
        }
        //echo json_encode($arr); //输出json数据
        echo $arr['msg']; //输出json数据
        
    }
}
?> 
