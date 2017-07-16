<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/16
 * Time: 17:23
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
    <title>Bookmark</title>
</head>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/common.js"></script>
<script src="js/set.js"></script>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/set.css">
<body>
<script src="js/addcontent.js"></script>
<script>
    window.onload=function () {
        let obj=new Upload();
        obj.up('js/upload.php');
    }

</script>
    <header class="title">
        <span>&lt;</span>
        <div>设置</div>
        <span></span>
    </header>
    <main>
<!--        上传头像-->
        <form method="post" class="box" enctype="multipart/form-data">
            <div class="headimg">
                <aside>
                    <input type="hidden" name="img" class="img" >
                </aside>
            </div>
<!--            修改昵称啥的-->
            <div class="wordbox">
                <div class="word mess">
                    <p></p>
                </div>
                <input type="hidden" class="id" value="<?php echo $row['id']?>">
                <input class="user" type="hidden" name="user" value="<?php echo @$_SESSION['u']?>">
                <input class="pass" type="hidden" name="pass" value="<?php echo @$_SESSION['p']?>">
                <div class="word">
                    <p>昵称：</p>
                    <input class="nickname" type="text" name="nickname" id="nickname" value="<?php echo @$row['nickname']?>" autocomplete="off">
                </div>
                <div class="word">
                    <p>年龄：</p>
                    <input class="age" type="text" name="age" value="<?php echo @$row['age']?>" autocomplete="off">
                </div>
                <div class="word">
                    <p>性别：</p>
                    <input class="sex" type="text" name="sex" value="<?php echo @$row['sex']?>" autocomplete="off">
                </div>
                <div class="word">
                    <p>邮箱：</p>
                    <input class="email" type="email" name="email" value="<?php echo @$row['email']?>" autocomplete="off">
                </div>
                <button type="button" class="btn">确认提交</button>
            </div>
        </form>
    </main>
</body>
</html>
<script>
    let back=$('header span:first-child');
    back.on("touchend",function () {
        window.history.back()
    })
    let user=$('.user').val();
    let pass=$('.pass').val();
    let btn=$('.btn');
    btn.on("touchend",function () {


        let nickname=$('.nickname').val();
        let age=$('.age').val();
        let sex=$('.sex').val();
        let email=$('.email').val();
        let id=$('.id').val();
        let img=$('.img').val();
        $.ajax({
            url:"editpreson.php",
            data:{id:id,user:user,pass:pass,nickname:nickname,age:age,sex:sex,email:email,img:img},
            success:function (data) {
                if(data=="ok"){
                    location.href="preson.php";
                }else{
                    alert(data)
                }
            }
        })

    })
</script>
