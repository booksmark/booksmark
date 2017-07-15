<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<script src="js/jquery.min.js"></script>
<link rel="stylesheet" href="css/login.css">
<body>
<section class="form">
    <input class="url" type="hidden" value="<?php echo $_SESSION['url']?>">
    <div class="use">账号：<input type="text" name="user" required autocomplete="off"></div>
    <div class="pass">密码：<input type="password" name="pass" required autocomplete="off"></div>
    <div class="yzm">
        验证码：<input type="text" name="check">
        <img src="../images.php" onclick="this.src='../images.php?abx='+Math.random();">
        <p></p>
    </div>
    <div class="zhuce"><input class="login" type="button" name="sub" value="登录">
        <h4 onclick="location.href='zhuce.html'">去注册</h4>
    </div>
</section>

</body>
</html>
<script>
    $('.login').on('click',function () {
        let p=$('.yzm p');
        let user=$('.use').children('input').val();
        let pass=$('.pass').children('input').val();
        let yzm=$('.yzm').children('input').val();
        let url=$('.url').val();
        $.ajax({
            url:"login.php",
            data:{user:user,pass:pass,yzm:yzm},
            success:function (data) {
                if(data=="ok"){
                    location.href=url;
                }else {
                    p.html(data)
                }
            }
        })
    })

</script>