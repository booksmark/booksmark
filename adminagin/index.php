<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/5/8
 * Time: 16:17
 */
session_start();



$user=$_REQUEST['user'];
$pass=$_REQUEST['pass'];
$check=$_REQUEST['check'];
$yzm=$_SESSION['yzm'];

$db=new mysqli('localhost','root','','createsqls');
$sql="select zhanghao,pass from user WHERE zhanghao='$user'";
$result=$db->query($sql);
$roq=$result->fetch_array(MYSQLI_ASSOC);
if($check==$yzm){
    if($user==$roq['zhanghao']){
        if($pass==$roq['pass']){
            $_SESSION['user']=$user;
            $_SESSION['pass']=$pass;
            $mess= '登录成功';
            $src='admin.php';
            include_once 'mess.html';
        }else{
            $mess= '密码错误,请重新登录';
            $src='index.html';
            include_once 'mess.html';
        }
    }else{
        $mess= '账号不存在,请重新登录';
        $src='index.html';
        include_once 'mess.html';
    }
}else{
    $mess= '验证码不正确';
    $src='index.html';
    include_once 'mess.html';
}
