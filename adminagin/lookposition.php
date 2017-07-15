<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/15
 * Time: 9:03
 */
include_once "lib/pulic.php";
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
    *{
        padding: 0;
        margin: 0;
    }
    main{
        width: 100%;
        height: auto;
        text-align: center;
        padding-left: 15%;
        box-sizing: border-box;
    }
    h1{
        height: 100px;
        line-height: 100px;
        text-align: center;
        font-weight: normal;
    }
    table{
        border: 1px solid #3b4249;
    }
    td{
        width: auto;
        padding: 4px 10px;
        box-sizing: border-box;
        text-align: center;
        border: 1px solid #e0e0e0;
    }
    td .img{
        width: 100px;
        height: 100px;
        overflow: hidden;
        display: flex;
        align-items: center;
    }
    td .img img{
        width: 100%;
    }
    td button{
        border: none;
        width: 50px;
        height: 30px;
    }
    tr{
        transition: background .1s;
    }
    tr:hover{
        background: #f8f8f8;
    }
</style>
<body>
    <h1>推荐位</h1>
    <main>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>id</th>
                <th>标题</th>
                <th>关键词</th>
                <th>缩略图</th>
                <th>cid</th>
                <th>pid</th>
                <th>删除</th>
            </tr>
            <?php
                $sql="select * from content WHERE pid<>0";
                $result=$db->query($sql);
                while ($row=$result->fetch_assoc()):
            ?>
                    <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['title']?></td>
                        <td><?php echo $row['joins']?></td>
                        <td><div class="img"><img src="<?php echo $row['img']?>"></div></td>
                        <td><?php echo $row['cid']?></td>
                        <td><?php echo $row['pid']?></td>
                        <td>
                            <button num="<?php echo $row['id']?>">删除</button>
                        </td>
                    </tr>
            <?php endwhile;?>
        </table>
    </main>
</body>
</html>
<script>
    let table=document.querySelector('table');
    table.onclick=function (e) {
        let obj=e.target;
        if(obj.nodeName=="BUTTON"){
            let id=obj.getAttribute('num');
            let ajax=new XMLHttpRequest();
            ajax.open("get",`delpid.php?id=${id}`);
            ajax.onload=function () {
                if(ajax.response=="ok"){
                    let son=obj.parentNode.parentNode;
                    son.parentNode.removeChild(son)
                }
            };
            ajax.send();
        }
    }
</script>