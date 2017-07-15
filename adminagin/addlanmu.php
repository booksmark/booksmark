<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/5/11
 * Time: 18:17
 */

include_once "lib/pulic.php";
$cid=$_REQUEST['id'];
$isshow=$_REQUEST['isshow'];
$add=$_REQUEST['updete'];

$sql="select name from catacory WHERE name='$add'";
$result=$db->query($sql);
$row=$result->fetch_array();
if($row){
    $mess="栏目已存在，请重新添加";
}else{
    $sql="insert into catacory (name,parentid,isshow) VALUES ('$add',$cid,$isshow)";
    $result=$db->query($sql);
    if($result){
        $mess="添加成功";
    }else{
        $mess="添加失败";
    }
}
$src="addcatacory.php";
include_once 'mess.html';