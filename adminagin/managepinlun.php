<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/12
 * Time: 17:29
 */
include_once "lib/pulic.php";
$sql="select * from message;";
$result=$db->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理评论</title>
</head>
<style>
    h1{
        height: 100px;
        line-height: 100px;
        text-align: center;
        font-weight: normal;
    }
    table{
        width: 1000px;
        height: auto;
    }
    th{
        width: 150px;
        height:auto;
        text-align: center;
    }
    td{
        text-align: center;
        padding: 0 20px;
        box-sizing: border-box;
        height: 80px;
    }
</style>
<body>
    <h1>评论管理</h1>
    <table cellspacing="0" cellpadding="0">
        <thead>
            <tr><th>用户</th>
                <th>时间</th>
                <th>文章</th>
                <th>内容</th>
                <th>文章ID</th>
                <th>操作</th>
            </tr>

        </thead>
        <tbody>
        <?php while ($row=$result->fetch_assoc()):?>
            <tr>
                <td><?php echo $row['name']?></td>
                <td><?php echo $row['time']?></td>
                <td><?php echo $row['title']?></td>
                <td><?php echo $row['content']?></td>
                <td><?php echo $row['conid']?></td>
                <td><a href="delpinlun.php?id=<?php echo $row['id']?>">删除</a></td>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>
</body>
</html>
