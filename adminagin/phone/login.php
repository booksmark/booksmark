<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/15
 * Time: 20:46
 */
session_start();
$url=$_SESSION['url'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
</head>
<script src="js/jquery.js"></script>
<script src="js/common.js"></script>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/login.css">
<body>
<input type="hidden" id="url" value="<?php echo $url?>">
<input type="hidden" id="headurl" value="<?php echo $_SESSION['headurl']?>">
    <section class="top"></section>
    <section class="title">登录
        <a href="javascript:;">&lt;</a>
    </section>
    <main>


        <section class="form">
            <p class="mess">

            </p>
            <div class="box">
                <input class="use" type="text" name="user" placeholder="user" autocompvare="off">
                <img src="img/user.png">
            </div>
            <div class="box">
                <input class="pass" type="password" name="pass" placeholder="password" autocompvare="off">
                <img src="img/key.png">
            </div>
            <div class="login">
                <button>login</button>
            </div>
            <div class="type">
                <a href="javascript:;">忘记密码？</a>
                <a href="reg.php">快速注册</a>
            </div>
        </section>
    </main>
</body>
</html>
<script>

    $(".title a").on("touchend",function () {
       window.history.back();
    })
    var input=$('input');
    input.focus(function () {
        $(this).css("border","1px solid #00a0e9")
    });
    input.blur(function () {
        $(this).css("border","1px solid white");
    });

    $('.login').on('touchend',function () {
        var url=$("#url").val();
        var headurl=$("#headurl").val();
        var p=$('.mess');
        var user=$('.use').val();
        var pass=$('.pass').val();
        $.ajax({
            url:"logins.php",
            data:{user:user,pass:pass},
            success:function (data) {
                if(data=="ok"){
                    if(url.indexOf("content")>-1){
                        location.href=url;
                    }else if(headurl.indexOf("list")>-1){
                        location.href=headurl;
                    }else {
                        location.href="resopose.php";
                    }
                }else {
                    p.html(data)
                }
            }
        })
    })
</script>