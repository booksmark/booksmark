<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 16:17
 */
include_once "lib/pulic.php";
$id=$_REQUEST['id'];
$sql="delete from content WHERE id=$id";
$result=$db->query($sql);

if($db->affected_rows>0){
    $mess="删除成功";
}else{
    $mess="删除失败";
}

$src="managecontent.php";
include_once "mess.html";