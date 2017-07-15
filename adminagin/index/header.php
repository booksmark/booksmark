<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 17:40
 */
session_start();
header('content-type:text/html;charset=utf8');
$db=new mysqli('localhost','root','','createsqls');
$db->query('set names utf8');
$sql="select * from catacory WHERE parentid=0 and isshow=0";
$result=$db->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <title></title>
</head>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/index.css">
<script src="js/jquery.min.js"></script>
<script src="js/index.js"></script>
<script src="js/bootstrap.js"></script>
<body>
<script>
    $(function () {

        $('.hea div:last-child').delegate('.back','click',function () {
            $.ajax({
                url:"delsession.php",
                success:function (data) {
                    if(data=="ok"){
                        $('.hea div:last-child').html("<a href='logn.php'>一键登录</a>");
                    }
                }
            })
        })
    })
</script>
<header>
    <section class="container hea">
        <div><img src="img/images/logo_03.png"></div>
        <div>
            <?php
            $url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
            $_SESSION['url']=$url;
                if(!isset($_SESSION['us'])){
                    echo "<a href='logn.php'>一键登录</a>";
                }else{
                    echo "欢迎<span>&nbsp;{$_SESSION['us']}</span>&nbsp;&nbsp;<a class='back' href='javascript:;'>退出登录</a>";
                }
            ?>
        </div>
    </section>
</header>
    <nav>
        <div class="container nav" >
            <ul class="bignav">
                <li class="bigli <?php  if(!isset($_REQUEST['id'])){echo 'active';}?>"><a href="index.php?">首页</a></li>

                <?php while ($row=$result->fetch_assoc()):?>
                    <li class="bigli <?php if(isset($_REQUEST['id'])){if($_REQUEST['id']==$row['cid']){echo 'active';}}?>">
                        <a href="catacory.php?id=<?php echo $row['cid'];?>"><?php echo $row['name']?></a>
                        <ul class="minnav">
                            <?php
                            $sql1="select name,cid from catacory WHERE parentid=".$row['cid'];
                            $result1=$db->query($sql1);
                            while ($row1=$result1->fetch_assoc()):
                                $cid=$row['cid']
                            ?>
                                <li class="minli">
                                    <a href="list.php?id=<?php echo $row['cid']?>&listid=<?php echo $row1['cid']?>&name=<?php echo $row1['name']?>"><?php echo $row1['name']?></a>
                                </li>
                            <?php endwhile;?>
                        </ul>
                    </li>
                <?php endwhile;?>
                <li class="bigli <?php if(isset($_REQUEST['id'])){if($_REQUEST['id']==8){echo "active";}}?>"><a href="about.php?id=8&conid=35">关于我们</a></li>

            </ul>
        </div>
    </nav>