<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/1
 * Time: 21:30
 */
include_once "pulic.php";
$id=$_REQUEST['id'];
$sql="select * from catacory WHERE parentid=$id";
$result=$db->query($sql);
$row=$result->fetch_assoc();

if($row){
    $mess="下级有子栏目，不能删除";
}else{
    $sql1="delete from catacory WHERE cid=$id";
    $result1=$db->query($sql1);
    if($result1){
        $mess="删除成功";
    }else{
        $mess="删除失败";
    }
}
$src="managecatacory.php";
include_once "mess.html";