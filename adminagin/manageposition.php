<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 16:58
 */
include_once "lib/pulic.php";
$sql="select * from position";
$result=$db->query($sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理推荐位</title>
</head>
<style>
    h1{
        height: 100px;
        line-height: 100px;
        text-align: center;
        font-weight: normal;
    }
    td{
        width: 100px;
        text-align: center;
    }
</style>
<body>
    <table>
        <h1>管理推荐位</h1>
        <tr>
            <th>推荐位id</th>
            <th>推荐位名字</th>
            <th>操作</th>
        </tr>
        <?php while ($row=$result->fetch_assoc()):?>
            <tr>
                <td><?php echo $row['id']?></td>
                <td><?php echo $row['name']?></td>
                <td>
                    <a href="editposition.php?id=<?php echo $row['id']?>">修改</a>
                    <a href="delposition.php?id=<?php echo $row['id']?>">删除</a>
                </td>

            </tr>
        <?php endwhile;?>
    </table>
</body>
</html>
