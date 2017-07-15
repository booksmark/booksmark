<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/15
 * Time: 8:42
 */
header('content-type:text/html;charset=utf8');
$db=new mysqli('localhost','root','','createsqls');
$db->query('set names utf8');