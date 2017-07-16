<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/14
 * Time: 18:25
 */
include_once "public.php";
$num=$_REQUEST['num'];
$sql="select * from content WHERE joins LIKE '%网%' limit $num,3";
$result=$db->query($sql);
$arr=array();
while ($row=$result->fetch_assoc()){
    $arr[]=$row;
}
echo json_encode($arr);