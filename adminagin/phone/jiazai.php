<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/14
 * Time: 18:25
 */
include_once "public.php";
$num=$_REQUEST['num']+7;
$nums=$num+5;
$keyword=$_REQUEST['keyword'];
$sql="select * from content WHERE joins LIKE '%h%' limit $num,$nums";
$result=$db->query($sql);
$arr=array();
while ($row=$result->fetch_assoc()){
    $arr[]=$row;
}
echo json_encode($arr);