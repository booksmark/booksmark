<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/7/16
 * Time: 0:02
 */
$keywords=$_REQUEST['val'];
include_once "public.php";
$sql="select * from content WHERE joins LIKE '%{$keywords}%'";
$result=$db->query($sql);
$arr=array();
while ($row=$result->fetch_assoc()){
    $arr[]=$row;
}
echo json_encode($arr);