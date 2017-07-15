<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 17:32
 */
session_start();
unset($_SESSION['user']);
$mess="退出成功";
$src='index.html';
include_once 'mess.html';