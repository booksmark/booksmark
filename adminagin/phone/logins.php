<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/15
 * Time: 23:09
 */
session_start();



$user=$_REQUEST['user'];
$pass=$_REQUEST['pass'];
$db=new mysqli('localhost','root','','createsqls');
$sql="select zhanghao,pass from createsqls.use WHERE zhanghao='$user'";
$result=$db->query($sql);
$roq=$result->fetch_assoc();

if($user==$roq['zhanghao']){
    if($pass==$roq['pass']){
        $_SESSION['u']=$user;
        $_SESSION['p']=$pass;
        echo "ok";
    }else{
        echo "密码错误";
    }
}else{
    echo "账号不存在";
}

