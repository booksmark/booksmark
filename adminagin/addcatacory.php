<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/5/11
 * Time: 15:30
 */
include_once "lib/pulic.php";
include_once "lib/class.php";
$obj=new All();
$obj->tree(0,-1,'&nbsp'.'&nbsp'.'└',$db,'catacory');
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
    .zen{
        margin-top: 10px;
    }
</style>
<body>
<form action="addlanmu.php" method="post">
    <p>栏目管理</p>
    <select name="id" id="">
        <option value="0">作为一级栏目</option>
        <?php echo $obj->str?>
    </select>

        <label>
            <pre>栏目名称</pre>
            <input type="text" name="updete"><br>
            <pre>是否在导航栏显示</pre>
            是：<input type="radio" name="isshow" value="0" checked>
            否：<input type="radio" name="isshow" value="1"><br>
            <input type="submit" value="添加" class="zen">
        </label>

    </form>
</body>
</html>
