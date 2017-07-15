<?php
session_start();



$user=$_REQUEST['user'];
$pass=$_REQUEST['pass'];
$check=$_REQUEST['yzm'];
$yzm=$_SESSION['yzm'];
$db=new mysqli('localhost','root','','createsqls');
$sql="select zhanghao,pass from createsqls.use WHERE zhanghao='$user'";
$result=$db->query($sql);
$roq=$result->fetch_assoc();
if($check==$yzm){
    if($user==$roq['zhanghao']){
        if($pass==$roq['pass']){
            $_SESSION['us']=$user;
            $_SESSION['pa']=$pass;
           echo "ok";
        }else{
            echo "密码错误";
        }
    }else{
        echo "账号不存在";
    }
    }else{
    echo "验证码错误";
}
