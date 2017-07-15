<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 16:02
 */
$id=$_REQUEST['id'];
include_once "lib/pulic.php";
$sql="select * from content WHERE cid=$id";
$result=$db->query($sql);
$row=$result->fetch_all(MYSQLI_ASSOC);
$arrjson=json_encode($row);
echo $arrjson;