<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/11
 * Time: 18:47
 */
header('content-type:text/html;charset=utf8');
$db=new mysqli('localhost','root','','createsqls');
$db->query('set names utf8');
$sql9="select * from catacory where parentid <> 0;";
$result9=$db->query($sql9);
$row9=$result9->fetch_all(MYSQLI_ASSOC);
echo json_encode($row9);