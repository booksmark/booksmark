<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/5/10
 * Time: 22:23
 */
session_start();
if(!isset($_SESSION['user'])){
    $mess="检测未登录，请先登录";
    $src="index.php";
    include_once "mess.html";
    exit();
}
header('content-type:text/html;charset=utf8');
$db=new mysqli('localhost','root','','createsqls');
$db->query('set names utf8');