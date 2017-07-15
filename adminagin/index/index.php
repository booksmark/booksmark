<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 18:13
 */
include_once "header.php";

?>

<script src="js/jquery.slideBox.js"></script>
<script src="js/jQindex.js"></script>
<link rel="stylesheet" href="css/jquery.slideBox.css">
<main class="container">
    <article class="floor1">
        <section class="floor1-left col-lg-4 col-md-6 col-xs-12">
            <div>
                <b>今日热点</b>
                <span></span>
            </div>
            <ul>
                <?php
                    $sql8="select title,id from content WHERE pid=5";
                    $result8=$db->query($sql8);
                    while ($row8=$result8->fetch_assoc()):
                ?>
                <li><a href="content.php?id=<?php echo $cid?>&conid=<?php echo $row8['id']?>"><?php echo $row8['title']?></a></li>
                <?php endwhile;?>
            </ul>
        </section>
        <section class="floor1-right col-lg-8 col-md-6 hidden-xs">
            <div id="demo1" class="slideBox">

                <ul class="items">
                    <?php
                        $sql7="select img,id,cid,title from content WHERE pid=4";
                        $result7=$db->query($sql7);
                        while ($row7=$result7->fetch_assoc()):
                    ?>
                    <li><a title="<?php echo $row7['title']?>" style="width: 100%;height: 100%" href="content.php?id=<?php echo $cid?>&conid=<?php echo $row7['id']?>" class="first"><img style="width: 100%;height: 100%" src="../<?php echo $row7['img']?>" title="<?php echo $row7['title']?>"></a></li>

                    <?php endwhile;?>

                </ul>

            </div>
        </section>
    </article>

<!--    二楼-->
    <article class="floor2 container">

        <ul class="floor2-top col-lg-12  list">

        </ul>
        <section class="floor-bottom">
            <ul class="floor2-bottom col-lg-12 con">

            </ul>
        </section>
    </article>


</main>
<?php include_once "footer.php"?>
<script>
    $('#demo1').slideBox();
</script>
