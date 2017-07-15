<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/6
 * Time: 10:59
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>上传文件</title>
</head>
<style>
    .file{
        width: 100px;
        height: 40px;
        line-height: 40px;
        background: coral;
        border-radius: 10px;
        text-align: center;
        position: relative;
    }
    .file input{
        width: 100%;
        height: 100%;
        opacity: 0;
        position: absolute;
        left: 0;
        top: 0;
    }

    .imgbox{
        width: 500px;
        height: auto;
        border: 1px solid #ccc;
        padding: 10px;
        box-sizing: border-box;
        margin: 10px 0;
        overflow: hidden;
    }
    .imgbox .list{
        margin: 10px;
        float: left;
        width: 100px;
        height: 100px;
        position: relative;
        border:1px solid #ccc;
    }
    .imgbox .list .del{
        color: #9B410E;
        width: 20px;
        height: 20px;
        line-height: 18px;
        text-align: center;
        font-size: 20px;
        font-weight: bold;
        position: absolute;
        top: 5px;
        right: 5px;
        background: #ccc;
        border-radius: 50%;
        display: none;
        transition: transform .5s;
    }
    .imgbox .list .del:hover{
        transform: rotate(120deg);
    }
    /*.imgbox .list:hover .del{*/
        /*display: block;*/
        /*cursor: pointer;*/


    /*}*/
    .imgbox .list img{
        width: 100%;
        height: 100%;
    }
    .imgbox .list .mess{
        width: 100%;
        height: 20px;
        position: absolute;
        bottom: 0;
        left: 0;
        color: coral;
        text-align: center;
        line-height: 20px;
        display: none;
    }
    .imgbox .list .progress{
        width: 100%;
        height: 10px;
        background: red;
        position: absolute;
        top:0;
        left:0;
        right:0;
        bottom:0;
        margin:auto;
    }
    .btn{
        width: 100px;
        height: 40px;
    }
    .btn button{
        width: 100%;
        height: 100%;
        background: coral;
        border: none;
        border-radius: 10px;
    }
</style>
<script src="js/addcontent.js"></script>
<body>

<!--    <div class="file">上传图片<input type="file" name="file" id="file"></div>-->
<!---->
<!--    <div class="imgbox">-->
<!--        <div class="list">-->
<!--            <img src="" alt="">-->
<!--            <section class="progress"></section>-->
<!--            <div class="del">×</div>-->
<!--            <div class="mess">提示消息</div>-->
<!--        </div>-->
<!---->
<!--    </div>-->
<!--    <div class="btn">-->
<!--        <button type="button">上传</button>-->
<!--    </div>-->

</body>
</html>
