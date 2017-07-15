<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/13
 * Time: 9:14
 */

include_once "lib/pulic.php";
$id=$_REQUEST['id'];
$user=$_REQUEST['user'];
$pass=$_REQUEST['pass'];
$sql="update createsqls.user set zhanghao='$user',pass='$pass' WHERE id=$id";
$result=$db->query($sql);

if($result){
    echo "ok";
}else {
    echo "miss";
}
