<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/19
 * Time: 11:25
 */
include_once "pulic.php";
$user=$_REQUEST['user'];
$pass=$_REQUEST['pass'];

$sql="insert into createsqls.use (zhanghao,pass) VALUES ('$user','$pass')";
$result=$db->query($sql);
if($result){
    echo "ok";
}else{
    echo "404";
}

