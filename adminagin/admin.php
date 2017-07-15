<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/5/8
 * Time: 20:22
 */
//include_once '../lib/session.php';
date_default_timezone_set("Asia/Shanghai");
$time=date("Y-m-d H:i:s");
session_start();
if(!isset($_SESSION['user'])){
    $mess="检测未登录，请先登录";
    $src="index.html";
    include_once "mess.html";
    exit();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<script src="js/jquery.js"></script>
<script src="js/secc.js"></script>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/secc.css">
<body>
<section class="top">
    <h1>登录成功！</h1>
    <h2>欢迎  <i><?php echo $_SESSION['user']?></i>  使用本系统
        <a href="tuichu.php">注销登录</a>
        <span>登录时间<?php echo $time?></span>
    </h2>
</section>
<section class="bottom">
    <section class="left">
        <ul>
            <li class="biaoti">
                <span>管理员信息</span>
                <ul>
                    <li><a href="Administrator.php" target="change">查看信息</a></li>
                </ul>
            </li>
            <li class="biaoti">
                <span>分类管理</span>
                <ul>
                    <li><a href="addcatacory.php" target="change">添加分类</a></li>
                    <li><a href="managecatacory.php" target="change">管理分类</a></li>
                </ul>
            </li>
            <li class="biaoti">
                <span>内容管理</span>
                <ul>
                    <li><a href="addcon.php" target="change">添加内容</a></li>
                    <li><a href="managecontent.php" target="change">管理内容</a></li>
                </ul>
            </li>
            <li class="biaoti">
                <span>推荐位管理</span>
                <ul>
                    <li><a href="lookposition.php" target="change">查看推荐位</a></li>
                    <li><a href="addposition.php" target="change">添加推荐位</a></li>
                    <li><a href="manageposition.php" target="change">管理推荐位</a></li>
                </ul>
            </li>
            <li class="biaoti">
                <span>评论管理</span>
                <ul>
                    <li><a href="managepinlun.php" target="change">查看评论</a></li>
                </ul>
            </li>
            <li class="biaoti">
                <span>前台用户</span>
                <ul>
                    <li><a href="preson.php" target="change">查看用户信息</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <section class="right">
        <iframe frameborder="0" src="message.html" name="change"></iframe>
    </section>
</section>
</body>
</html>
