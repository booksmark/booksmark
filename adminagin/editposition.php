<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 17:07
 */
$id=$_REQUEST['id'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改推荐位</title>
</head>
<body>
    <form action="editpositioncheck.php" method="post">
        <input type="hidden" name="positionid" value="<?php echo $id?>">
        推荐位ID： <input type="text" disabled value="<?php echo $id?>"><br>
        推荐位名字：<input type="text" name="name"><br>
        <input type="submit" value="确认修改">
    </form>
</body>
</html>
