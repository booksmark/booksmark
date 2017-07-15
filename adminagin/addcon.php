<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/3
 * Time: 18:16
 */
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
<style>
    body,html{
        height: 100%;
        width: 100%;
    }
    section{
        float: left;
    }
    .left{
        height: 100%;
        width: 30%;
        border-right:1px solid #999999;
    }
    .left iframe{
        width: 100%;
        height: 100%;
    }
    .right{
        height: 100%;
        width: 60%;
    }
    .right iframe{
        width: 100%;
        height: 100%;
    }
</style>
<body>
    <section class="left">
        <iframe src="addlist.php" frameborder="0" name="addlist"></iframe>
    </section>
    <section class="right">
        <iframe src="" frameborder="0" name="addcontent"></iframe>
    </section>
</body>
</html>
