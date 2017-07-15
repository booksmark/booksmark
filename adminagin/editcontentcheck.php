<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 16:37
 */
$id=$_REQUEST['id'];
$cid=$_REQUEST['cid'];
$con=@$_REQUEST['con'];
$title=$_REQUEST['title'];
$img=$_REQUEST['img'];
$posi=implode(',',$_REQUEST['posi']);
include_once "lib/pulic.php";
$sql="update content set title='$title',img='$img',content='$con',cid=$cid,pid=$posi WHERE id=$id";
$result=$db->query($sql);

if($result){
    $mess="修改成功";
}else {
    $mess = "修改失败，请重新修改";
}
$src="managecontent.php";
include_once 'mess.html';