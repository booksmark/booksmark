<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/3
 * Time: 17:07
 */
include_once "lib/pulic.php";
$title=$_POST['title'];
$content=$_REQUEST['con'];
$cid=$_REQUEST['cid'];
$img=$_REQUEST['img'];
$cids=$_REQUEST['cids'];
@$posi=implode(',',$_REQUEST['posi']);

$sql="insert into content (title,img,content,cid,pid) VALUES ('$title','$img','$content',$cid,'$posi')";
$result=$db->query($sql);
if($db->affected_rows>0){
    $mess="添加成功";
}else{
    $mess="添加失败";
}
$src="addcontent.php?cid={$cids}";
include_once "mess.html";
