<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/15
 * Time: 23:51
 */
session_start();
include_once "pulic.php";
$user=@$_SESSION['u'];
$sql="select * from createsqls.use WHERE zhanghao='$user'";
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
    <title>个人信息</title>
</head>
<script src="js/jquery.js"></script>
<script src="js/common.js"></script>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/preson.css">
<body>
    <header>
        <span>&lt;</span>
        <div>个人信息</div>
        <span><a href="set.php"><img src="img/set.png"></a></span>
    </header>
    <main>
        <section class="box">
            <div class="list">
                <div><b>昵称：</b><span><?php echo @$row['nickname']?></span></div>
                <div><b>性别：</b><span><?php echo @$row['sex']?></span></div>
                <div><b>年龄：</b><span><?php echo @$row['age']?></span></div>
                <div><b>email：</b><span><?php echo @$row['email']?></span></div>
            </div>
            <div class="list">
                <div class="imgbox">
                    <img src=js/<?php echo $row['img'] ?>>
                </div>

            </div>
        </section>
        <button class="btn">注销登录</button>
    </main>

</body>
</html>
<script>
    let btn=$("button");
    btn.on("touchend",function () {
        $.ajax({
            url:"delsession.php",
            success:function (data) {
                if(data=="ok"){
                    location.href="resopose.php";
                }
            }
        })
    })
    let back=$('header span:first-child');
    back.on("touchend",function () {
        window.history.back()
    })
</script>