<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/18
 * Time: 13:57
 */

include_once "pulic.php";
$conid=$_REQUEST['id'];
$user=$_REQUEST['user'];
$title=$_REQUEST['title'];
$con=$_REQUEST['con'];
//$sql="update message set title='$title',name='$user',content='$con',conid=$conid";
$sql="insert into message (title,name,content,conid) VALUES ('$title','$user','$con',$conid)";
$result=$db->query($sql);
if($result){
    echo "ok";
}else{
    echo "";
}
