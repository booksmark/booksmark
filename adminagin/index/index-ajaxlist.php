<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/11
 * Time: 18:20
 */
$idn=$_REQUEST['id'];
header('content-type:text/html;charset=utf8');
$db=new mysqli('localhost','root','','createsqls');
$db->query('set names utf8');
$sql11="select * from content WHERE cid=".$idn;
$result11=$db->query($sql11);
$arr=array();
while ($row11=$result11->fetch_assoc()){
    $arr[]=$row11;
}
echo json_encode($arr);