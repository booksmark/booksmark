<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/12
 * Time: 18:00
 */
include_once "lib/pulic.php";
$sql="select * from createsqls.use";
$result=$db->query($sql);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>用户信息</title>
</head>
<style>
    *{
        padding: 0;
        margin: 0;
    }
    h1{
        height: 100px;
        line-height: 100px;
        text-align: center;
        font-weight: normal;
    }
    .ul{
        height: auto;
        width: 100%;
    }
    .ul li {
        width: 100%;
        height: auto;
        border-bottom: 1px solid #ccc;
    }
    .ul li .divbox {
        width: 100%;
        height: 50px;
        display: flex;
    }
    .ul li .divbox div{
        width: 33.3%;
        height: 100%;
        line-height: 50px;
        text-align: center;
    }
</style>
<body>
    <h1>用户信息</h1>
    <ul class="ul">
        <li>
            <div class="divbox">
                <div>用户名</div>
                <div>密码</div>
                <div>操作</div>
            </div>
        </li>
        <?php while ($row=$result->fetch_assoc()):?>
        <li>
            <div class="divbox">
                <div><?php echo $row['zhanghao']?></div>
                <div><?php echo $row['pass']?></div>
                <div>
                    <a href="delpreson.php?id=<?php echo $row['id']?>">删除</a>
                </div>
            </div>

        </li>
        <?php endwhile;?>
    </ul>
</body>
</html>
