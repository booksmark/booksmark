<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/12
 * Time: 18:00
 */
include_once "lib/pulic.php";
$sql="select * from createsqls.user";
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
<script src="js/jquery.js"></script>
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
    .nextbox{
        height: 50px;
        width: 100%;
        padding: 10px 0;
        border-top: 1px dashed #ccc;
        display: none;
        line-height: 70px;
    }
    .nextbox div{
        float: left;
        width: 33.33%;
        height: 100%;
        text-align: center;
        line-height: 50px;
    }
    .nextbox div input {
        height: 30px;
        border: none;
        border-bottom: 1px solid #ccc;
        box-sizing: border-box;
        font-size: 20px;

    }
    button{
        height: 30px;
        padding: 0 10px;
        line-height: 30px;
        background: cornflowerblue;
        box-sizing: border-box;
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
                <div class="u"><?php echo $row['zhanghao']?></div>
                <div class="p"><?php echo $row['pass']?></div>
                <div>
                    <a href="delanmin.php?id=<?php echo $row['id']?>">删除</a>
                    <a href="javascript:;" id="<?php echo $row['id']?>" class="edit">编辑</a>
                </div>
            </div>
            <div class="nextbox"></div>
        </li>
    <?php endwhile;?>
</ul>
</body>
</html>
<script>
    $('.edit').on('click',function () {
        let nextbox=$(this).parent().parent().parent().children('.nextbox');
        let li=$(this).parent().parent().parent();
        console.log(li)
        let id=$(this).attr('id');
        nextbox.html(`
            <div>用户名：<input type="text" name="" id="user"></div>
            <div>密码：<input type="password" name="" id="pass"></div>
            <button>确认修改</button>
        `).css("display",'block');

        nextbox.children('button').on('click',function () {
            let user=$('#user').val();
            let pass=$('#pass').val();
            $.ajax({
                url:"editadmin.php",
                data:{id:id,user:user,pass:pass},
                success:function (data) {
                    if(data=="ok"){
                        nextbox.html('');
                        li.find('.u').html(user);
                        li.find('.p').html(pass)
                    }
                }
            })
        })

    })
</script>