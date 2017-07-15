<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/1
 * Time: 20:42
 */
include_once "lib/pulic.php";
$sql="select * from catacory";
$result=$db->query($sql);
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
    h1{
        height: 100px;
        line-height: 100px;
        text-align: center;
        font-weight: normal;
    }
    table{
        border: 1px solid #ccc;
    }
    th{
        box-sizing: border-box;
        border: 1px solid #ccc;
    }
    td{
        box-sizing: border-box;
        width: 200px;
        text-align: center;
        overflow: hidden;
        border: 1px solid #ccc;
    }
</style>
<body>
        <h1>分类管理</h1>
    <table cellpadding="0" cellspacing="1">
        <tr>
            <th>分类id</th>
            <th>分类名称</th>
            <th>是否在导航栏显示</th>
            <th>管理</th>
        </tr>
        <?php while ($row=$result->fetch_assoc()):?>
        <tr>
            <td><?php echo $row['cid']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['isshow']?></td>
            <td>
                <a href="editcatacory.php?id=<?php echo $row['cid']?>">编辑</a>
                <a href="delcatacory.php?id=<?php echo $row['cid']?>">删除</a>
            </td>
        </tr>
        <?php endwhile;?>
    </table>
</body>
</html>
