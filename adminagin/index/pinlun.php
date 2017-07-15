<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/5
 * Time: 15:10
 */
session_start();
header('content-type:text/html;charset=utf8');
$db=new mysqli('localhost','root','','createsqls');
$db->query('set names utf8');
$mess=$_REQUEST['mess'];
$name=$_REQUEST['use'];
$title=$_REQUEST['title'];
$conid=$_REQUEST['conid'];

$sql="insert into message (name,title,content,conid) VALUES ('$name','$title','$mess',$conid)";
$result=$db->query($sql);

if($result){
    $sqls="select time from message WHERE content='$mess'";
    $results=$db->query($sqls);
    $rows=$results->fetch_assoc();
    echo $rows['time'];
}else{
    echo "404";
}
