<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 16:52
 */
include_once "lib/pulic.php";
$name=$_REQUEST['position'];
$sql="insert into position (name) VALUES ('$name')";
$result=$db->query($sql);
if($db->affected_rows>0){
    $mess="添加成功";
}else{
    $mess="添加失败";
}
$src="addposition.php";
include_once "mess.html";