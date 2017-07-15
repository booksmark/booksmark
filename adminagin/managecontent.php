<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 15:44
 */
include_once "lib/pulic.php";
include_once "lib/class.php";
$obj=new All();
$obj->tree(0,-1,'_',$db,'catacory');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>管理内容</title>
</head>
<script src="js/jquery.js"></script>
<script src="js/managecontent.js"></script>
<style>
    th{
        box-sizing: border-box;
        border: 1px solid #ccc;
    }
    td{
        box-sizing: border-box;
        width: 150px;
        height: 100px;
        text-align: center;
        overflow: hidden;
        border: 1px solid #ccc;
    }
    textarea{
        width: 150px;
        height: 100px;
        overflow: hidden;
        border: none;
    }

    p{
        height: 100%;
    }
    img{
        width: 150px;
    }
    select{
        width: 300px;
        height: 40px;
        margin-bottom: 20px;
    }
</style>
<body>
    <h5>请选择分类</h5>
    <select name="id" id="sel">
        <option value="0">无分类</option>
        <?php echo $obj->str?>
    </select>
    <table cellspacing="0" cellpadding="0">
        <thead>
            <tr>
                <th>栏目ID</th>
                <th>标题</th>
                <th>内容</th>
                <th>时间</th>
                <th>缩略图</th>
                <th>所在栏目ID</th>
                <th>推荐位ID</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</body>
</html>
