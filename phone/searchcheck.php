<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/7/15
 * Time: 23:28
 */
$conid=$_REQUEST['conid'];
include_once "public.php";
$sql="select * from content WHERE cid=$conid";
$result=$db->query($sql);
$arr=array();
while ($row=$result->fetch_assoc()){
    $arr[]=$row;
}
echo json_encode($arr);