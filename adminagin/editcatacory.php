<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/1
 * Time: 21:36
 */
include_once "lib/pulic.php";
$id=$_REQUEST['id'];
$sql="select * from catacory WHERE cid=$id";
$result=$db->query($sql);
$row=$result->fetch_assoc();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改分类</title>
</head>
<body>
    <form action="editcatacorycheck.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id?>">
        修改分类名：<input type="text" name="name" value="<?php echo $row['name']?>"><br>
        修改栏目上级id：<input type="text" name="posid" value="<?php echo $row['parentid']?>"><br>
        <pre>是否在导航栏显示</pre>
        是：<input type="radio" name="isshow" value="0" checked>
        否：<input type="radio" name="isshow" value="1"><br>
            <input type="submit" value="确认修改">
    </form>
</body>
</html>
