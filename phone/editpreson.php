<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/18
 * Time: 17:28
 */
include_once "pulic.php";
$id=$_REQUEST['id'];
$user=$_REQUEST['user'];
$pass=$_REQUEST['pass'];
$nickname=$_REQUEST['nickname'];
$age=$_REQUEST['age'];
$sex=$_REQUEST['sex'];
$email=$_REQUEST['email'];
$img=$_REQUEST['img'];
$sql="update createsqls.use set zhanghao='$user',pass='$pass',nickname='$nickname',age=$age,sex='$sex',email='$email',img='$img' WHERE id=$id";
$result=$db->query($sql);
if($result){
    echo "ok";
}else{
    echo $sql;
}