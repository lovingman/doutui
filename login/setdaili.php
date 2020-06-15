<?php
session_start();
$mysqli = new mysqli("127.0.0.1", "root", "root", "yunkehuslangfang");
if (!$mysqli) {
    echo "<script>alert('数据库连接失败！')</script>";
} 

    if (isset($_GET['telephone'])) {
        $mysqli->query('set names utf8;');
        $telephone = $_GET['telephone'];
        for ($xx=7; $xx>=0; $xx--) {
                $dailiid=substr($telephone,$xx,11-$xx);
                $selectsql="select telephone from user where dailiid='$dailiid' and telephone!='$telephone';";
                $selresult = $mysqli->query($selectsql);
                $ishave2=0;
                while($row = $selresult->fetch_assoc()){
                    $ishave2=1;
                }
                if($ishave2==0)
                   break;
        }
        if(isset($_GET['classify'])&& $_GET['classify']==2)
        {
           $sqls = "UPDATE `yunkehuslangfang`.`user` SET classify='爆破长',`dailiid` = '$dailiid' WHERE `user`.`telephone` ='$telephone';"; //SQL璇彞
           //$sqls2 = "INSERT INTO `payrecord`(`nickname`, `timuid`, `money`, `out_trade_no`, `pay_status`, `fromid`, `testtime`,`classify`) VALUES ('$telephone',0,(select zhao2money from basemoney where classifyname=(select classify from user where dailiid=(select fromwho from user where telephone= '$telephone'))),'00000','0',(select telephone from user where  dailiid=(select fromwho from user where telephone= '$telephone')) ,NULL,'yao');";
        }
		else if(isset($_GET['classify'])&& $_GET['classify']==3)
        {
           $sqls = "UPDATE `yunkehuslangfang`.`user` SET classify='爆破王',`dailiid` = '$dailiid' WHERE `user`.`telephone` ='$telephone';";
           //$sqls2 = "INSERT INTO `payrecord`(`nickname`, `timuid`, `money`, `out_trade_no`, `pay_status`, `fromid`, `testtime`,`classify`) VALUES ('$telephone',0,(select zhao3money from basemoney where classifyname=(select classify from user where dailiid=(select fromwho from user where telephone='$telephone'))),'00000','0',(select telephone from user where  dailiid=(select fromwho from user where telephone= '$telephone')) ,NULL,'yao');";      
        }
		else
        {
           $sqls = "UPDATE `yunkehuslangfang`.`user` SET classify='爆破手',`dailiid` = '$dailiid' WHERE `user`.`telephone` ='$telephone';"; //SQL璇彞
           //$sqls2 = "INSERT INTO `payrecord`(`nickname`, `timuid`, `money`, `out_trade_no`, `pay_status`, `fromid`, `testtime`,`classify`) VALUES ('$telephone',0,(select zhao1money from basemoney where classifyname=(select classify from user where dailiid=(select fromwho from user where telephone='$telephone'))),'00000','0',(select telephone from user where  dailiid=(select fromwho from user where telephone= '$telephone')) ,NULL,'yao');";     
        }
//$results = $mysqli->query($sqls2);
        $results = $mysqli->query($sqls);

        if($results>0)
            echo "<script>alert('注册成功!".$results."')</script>";
        else
	   echo "<script>alert('该手机号已经注册过!')</script>";
        header("Location:../index.php");
        
    }




?> 
