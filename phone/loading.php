<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/14
 * Time: 16:58
 */
sleep(1);
include_once "pulic.php";
$keyword=$_REQUEST['keyword'];
$nub=$_REQUEST['nub'];
$nubs=$nub+1;
$sql="select * from content WHERE joins LIKE '%{$keyword}%' limit $nub,$nubs";
$result=$db->query($sql);
$arr=array();
while ($row=$result->fetch_assoc()){
    $arr[]=$row;
}
echo json_encode($arr);