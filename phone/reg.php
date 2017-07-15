<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/15
 * Time: 22:21
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register</title>
</head>
<script src="js/jquery.js"></script>
<script src="js/jquery.validate.min.js"></script>
<script src="js/common.js"></script>
<script src="js/reg.js"></script>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/reg.css">
<body>
<header class="title">
    <span>&lt;</span>
    <div>注册</div>
    <span></span>
</header>
    <section class="top"></section>
    <main>


        <form class="box">
            <p class="mess">

            </p>
            <div class="box">
                <input type="text" name="user" id="user" placeholder="user" autocomplete="off">
                <img src="img/user.png">
            </div>
            <div class="box">
                <input type="password" name="pass" id="pass" placeholder="password" autocomplete="off">
                <img src="img/key.png">
            </div>
            <div class="box">
                <input type="password" name="passagin" id="passagin" placeholder="passwordagin" autocomplete="off">
                <img src="img/key.png">
            </div>
            <div class="box check">
                <input type="tel" name="phone" id="phone" placeholder="11位手机号码" autocomplete="off">
                <div class="get">点击获取短信验证码</div>
            </div>
            <div class="box">
                <input type="text" name="check" id="check" placeholder="validate" autocomplete="off">
                <img src="img/phone.png">
            </div>
            <div class="login">
                <button type="button">register</button>
            </div>
        </form>
    </main>
</body>
</html>
<script>
    let input=$('input');
    input.focus(function () {
        $(this).css("border","1px solid #00a0e9")
    });
    input.blur(function () {
        $(this).css("border","1px solid white")
    });
    let back=$('header span:first-child');
    back.on("touchend",function () {
        window.history.back()
    });

    $('.get').on("touchend",function () {
        let phone=$('.check input').val();
        if(phone!="") {
            $.ajax({
                url: "regyzm.php",
                data: {phone: phone},
                success: function (data) {
                    $('.get').attr('value',data)
                }
            })
        }else{
            alert("请先填写手机号");
        }
    });
    $('.login button').on('touchend',function () {
        let check=$('#check').val();
        let yam=$('.get').attr('value');
        if(check==yam) {
            $('.mess').html('');
            let user = $('#user').val();
            let pass = $('#pass').val();
            $.ajax({
                url: "regs.php",
                data: {user: user, pass: pass},
                success: function (data) {
                    if(data=="ok"){
                        alert('注册成功，去登录');
                        location.href="login.php";
                    }else{
                        alert('注册失败');
                        history.go(0);
                    }
                }
            })
        }else{
            $('.mess').html('验证码错误')
        }
    })

</script>