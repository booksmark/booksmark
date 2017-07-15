<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/7
 * Time: 21:58
 */
include_once "lib/pulic.php";
$id=$_REQUEST['id'];
$img=@$_REQUEST['img'];
$sql="update content set img='' WHERE id=$id";
var_dump($sql);
$db->query($sql);
if($db->query($sql)){
    echo "ok";
}