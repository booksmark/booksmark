<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/15
 * Time: 9:46
 */
include_once "lib/pulic.php";
$id=$_GET['id'];
$sql="update content set pid=0 WHERE id=$id";
$result=$db->query($sql);
if($result){
    echo "ok";
}else{
    echo "miss";
}