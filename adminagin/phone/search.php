<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/7/15
 * Time: 22:48
 */
include_once "public.php";
$sql="select * from catacory WHERE parentid!=0 and isshow=0";
$result=$db->query($sql);
$arr=array();
while ($row=$result->fetch_assoc()){
    $arr[]=$row;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>jianshu</title>
    <script src="js/common.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/iscroll.js"></script>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
<style>
    html,body{
        width: 100%;
        height: 100%;
        background: #f8f8f8;
        overflow: hidden;
        position: relative;
    }
    @font-face {
        font-family: 'iconfont';
        src: url('css/iconfont.eot');
        src: url('css/iconfont.eot?#iefix') format('embedded-opentype'),
        url('css/iconfont.woff') format('woff'),
        url('css/iconfont.ttf') format('truetype'),
        url('css/iconfont.svg#iconfont') format('svg');
    }

    .iconfont{
        font-family:"iconfont" !important;
        font-size:0.42rem;font-style:normal;
        -webkit-font-smoothing: antialiased;
        -webkit-text-stroke-width: 0.2px;
        -moz-osx-font-smoothing: grayscale;
    }
    header{
        height: 0.88rem;
        width: 100%;
        line-height: 0.88rem;
        display: flex;
        align-items: center;
        background: #fff;
        position: absolute;
        top:0;
        left: 0;
    }
    header a{
        display: block;
        width: 0.88rem;
        height: 0.88rem;
        font-size: 0.36rem;
        text-align: center;
        line-height: 0.88rem;
        font-family: "宋体";
        font-weight: bold;
        color: #00a0e9;
    }
    header input{
        width: 5rem;
        height: 0.6rem;
        border-radius: 0.3rem;
        border:1px solid #ccc;
        outline: none;
        padding: 0 0.2rem;
        margin-left: 0.5rem;
    }
    #wrapper{
        position: absolute;
        top:1rem;
        left: 0;
        right: 0;
        bottom: 1rem;
        padding: 0.12rem;
        overflow: hidden;
    }
    .title{
        width: 100%;
        height: 2rem;
        border-radius: 0.08rem;
        background: #fff;
        padding: 0.24rem 0.12rem;
        box-sizing: border-box;
        display: flex;
        justify-content: flex-start;
        flex-wrap: wrap;
        margin-bottom: 0.2rem;
    }
    h3{
        height: 0.5rem;
        line-height: 0.5rem;
        padding-left: 0.12rem;
        box-sizing: border-box;
        font-size: 0.30rem;
        margin: 0;
        border-left: 0.04rem solid #00a0e9;
        margin-bottom: 0.2rem;
    }
    .title div{
        font-size: 0.28rem;
        width: auto;
        height: 0.6rem;
        padding: 0 0.4rem;
        line-height: 0.6rem;
        color: #00a0e9;
        border-radius: 0.2rem;
        border:1px solid #00a0e9;
        margin-right: 0.14rem;
    }
    .conbox{
        width: 100%;
        height: auto;
        border-radius: 0.08rem;
        background: #fff;
        padding: 0.12rem;
        box-sizing: border-box;
    }
    .conbox li{
        width: 100%;
        height: 2rem;
        margin: 0.2rem 0;
        border-bottom: 0.02rem dashed #969696;
    }
    .conbox li:last-child{
        border: none;
    }
    .conbox li a{
        display: block;
        width: 100%;
        height: 100%;
    }
    .conbox li a h4{
        float: left;
        color: #222;
        width: 100%;
        height: 0.5rem;
        overflow: hidden;
        line-height: 0.5rem;
        font-size: 0.28rem;
        text-align: center;
        padding: 0 1rem;
        box-sizing: border-box;
    }
    .conbox li a .info{
        float: left;
        width: 70%;
        height: 0.7rem;
        font-size: 0.24rem;
        color: #333;
        overflow: hidden;
    }
    .conbox li a .imgbox{
        float: right;
        width: 20%;
        height: 1.4rem;
        overflow: hidden;
    }
    .conbox li a .imgbox img{
        width: 100%;
    }
    .conbox li a .time{
        float: left;
        width: 100%;
        height: 0.4rem;
        font-size: 0.24rem;
        color: #969696;
        margin-top: -0.6rem;
    }

    .conbox div.mess{
        color: #969696;
        width: 100%;
        height: 2rem;
        line-height: 1rem;
        text-align: center;
        font-size: 0.36rem;
        font-family:"微软雅黑 Light";
    }
</style>
    <header>
        <a href="javascript:;">&lt;</a>
        <input type="search" class="search">
        <a href="javascript:;" class="iconfont sou">&#xe606;</a>
    </header>
    <main id="wrapper">
        <article>
            <h3>热搜标签</h3>
            <div class="title">
                <?php foreach ($arr as $v){?>
                <div conid="<?php echo $v['cid']?>"><?php echo $v['name']?></div>
                <?php }?>
            </div>
            <h3>搜索结果</h3>
            <ul class="conbox">
                <div class="mess">暂无结果</div>
            </ul>
        </article>
    </main>
<?php include_once "footer.php"?>
<script>
    $("header a").first().on("touchend",function () {
        window.history.back();
    })

    $(".search").focus(function () {
        $(this).css("border","1px solid #00a0e9")
    }).blur(function () {
        $(this).css("border","1px solid #ccc")
    })
    $(".title").delegate("div","touchend",function () {
        var conid=$(this).attr("conid");
        $.ajax({
            url:"searchcheck.php",
            data:{conid:conid},
            dataType:"json",
            success:function (data) {
                $(".conbox").html("");
                data.forEach(function (v) {
                    $("<li>").html(`
                    <a href=content.php?id="${v.id}"&name="${v.title}">
                        <h4>${v.title}</h4>
                        <div class="info">
                            ${v.summary}
                        </div>
                        <div class="imgbox">
                            <img src="../${v.img}" alt="">
                        </div>
                        <div class="time">${v.time}</div>
</a>
                    `).appendTo($(".conbox"))
                })
                var myScroll = new IScroll('#wrapper', {click:true});
            }
        })
    })



    $(".sou").on("touchend",function () {
        var val=$(".search").val();
        if(val==""){
            $(this).unbind("touchend")
        }else {
            $.ajax({
                url:"searchChecks.php",
                data:{val:val},
                dataType:"json",
                success:function (data) {
                    if(data.length>0){
                        $(".conbox").html("");
                        data.forEach(function (v) {
                            $("<li>").html(`
                    <a href=content.php?id="${v.id}"&name="${v.title}">
                        <h4>${v.title}</h4>
                        <div class="info">
                            ${v.summary}
                        </div>
                        <div class="imgbox">
                            <img src="../${v.img}" alt="">
                        </div>
                        <div class="time">${v.time}</div>
</a>
                    `).appendTo($(".conbox"))
                        })
                    }else {
                        $(".conbox").html("");
                        $("<div class='mess'>").html("很抱歉，没有该内容<br>换个词试试，如：冬天，历史，文学").appendTo($(".conbox"))
                    }
                    var myScroll = new IScroll('#wrapper', {click:true});
                }
            })
        }
    })
</script>