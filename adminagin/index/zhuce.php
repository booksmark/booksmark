<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/5/8
 * Time: 20:47
 */
session_start();

$user=$_REQUEST['us'];
$pass=md5($_REQUEST['pa']);
//查询库中账号
$db=new mysqli('localhost','root','','createsqls');
$sql="select zhanghao,pass from user WHERE zhanghao='$user'";
$result=$db->query($sql);
//把结果转化为关联数组
$arr=$result->fetch_array(MYSQLI_ASSOC);
if(!isset($arr['zhanghao'])){
    //如果注册的账号库中没有的话增
    $sqls="insert into createsqls.use (zhanghao,pass) VALUES ('$user','$pass')";
    $res=$db->query($sqls);
    $mess="注册成功";
    $src="logn.php";
    include_once 'success.html';
    exit();
}else{
    $mess="账号已存在，请重新注册";
    $src='zhuce.html';
    include_once 'success.html';
}
