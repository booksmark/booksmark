<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/14
 * Time: 10:28
 */
session_start();
include_once "pulic.php";
$sql="select name,cid from catacory WHERE parentid<>0 and isshow=0";
$result=$db->query($sql);
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
<link rel="stylesheet" href="css/common.css">
<script src="../js/jquery.js"></script>
    <script src="js/common.js"></script>
<script src="js/iscroll.js"></script>
<script src="mui.js"></script>

<script type="text/javascript" charset="utf-8">
    mui.init();
</script>
<script src="js/reso.js"></script>
<link rel="stylesheet" href="css/resopose.css">
<link rel="stylesheet" href="css/footer.css">
<link rel="stylesheet" href="css/swiper.css">

<body>
<header id="header">
    <span></span>
    <div>Headline</div>
    <span>
        <?php if(isset($_SESSION['u'])){
            echo '<a href="preson.php" style="padding:0"><img src="img/user.png"></a>';
        }else{
            echo '<a href="login.php" style="padding:10px;"><img src="img/ren.png"></a>';
        }?>

    </span>
</header>
<section class="nav">
    <div class="navbox">
        <?php while ($row=$result->fetch_assoc()):?>
        <a href="lists.php?id=<?php echo $row['cid']?>&name=<?php echo $row['name']?>"><?php echo $row['name']?></a>
        <?php endwhile;?>
    </div>
</section>
<section class="banner">


    <div class="swiper-container bannerbox">

        <ul class="swiper-wrapper bannerboxs">
            <?php
            $sql7="select img,id,cid,title from content WHERE pid LIKE '%4%'";
            $result7=$db->query($sql7);
            while ($row7=$result7->fetch_assoc()):
                ?>
                <li style="height: 100%" class="swiper-slide li"><a title="<?php echo $row7['title']?>" style="width: 100%;height: 100%" href="content.php?id=<?php echo $row7['id']?>&name=<?php echo $row7['title']?>" class="first"><img style="width: 100%;height: 100%" src="../<?php echo $row7['img']?>" title="<?php echo $row7['title']?>"></a></li>

            <?php endwhile;?>

        </ul>

    </div>
<script src="swiper.js"></script>
    <script>
        var swiper=new Swiper('.swiper-container',{
            autoplay: 2000,
            loop:true,
            autoplayDisableOnInteraction : false
        })
    </script>

</section>
<section id="wrapper">
<article>
    <h3 class="title">推荐阅读</h3>
    <ul class="new">
        <?php
        $sqls="select * from content WHERE joins LIKE 'h%' limit 0,6";
        $results=$db->query($sqls);
        while ($rows=$results->fetch_assoc()):
            ?>
            <li>
                <a href="content.php?id=<?php echo $rows['id']?>&name=<?php echo $rows['title']?>">
                    <h4 join="<?php echo $rows['joins']?>"><?php echo $rows['title']?></h4>
                    <div><img src="../<?php echo $rows['img']?>"></div>
                </a>
            </li>
        <?php endwhile;?>
        <p class="p"></p>
    </ul>
</article>
</section>
<?php include_once "footer.php"?>