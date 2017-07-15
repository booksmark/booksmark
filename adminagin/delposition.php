<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 17:03
 */
include_once "lib/pulic.php";
$id=$_REQUEST['id'];
$sql="delete from position WHERE id=$id";
$result=$db->query($sql);
if($result){
    $mess="删除成功";
}else{
    $mess="删除失败";
}
$src="manageposition.php";
include_once "mess.html";