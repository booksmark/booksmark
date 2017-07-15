<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/14
 * Time: 23:34
 */
include_once "header.php";
include_once "pulic.php";
$id=$_GET['id'];
$sql="select * from catacory WHERE parentid=$id";
$result=$db->query($sql);
?>
<link rel="stylesheet" href="css/listagin.css">
<main id="wrapper">
    <section>

        <?php while ($row=$result->fetch_assoc()):?>
            <a href="lists.php?id=<?php echo $row['cid']?>&name=<?php echo $row['name']?>" style="width: 100%;height: 200px;background: url('../phone/img/g.jpg');background-size: cover;opacity: .8;">
                <h3><?php echo $row['name']?></h3>
            </a>
        <?php endwhile;?>
    </section>
</main>

<?php include_once "footer.php"?>
<script>
    myScroll = new IScroll('#wrapper', {
        scrollbars: true,//是否显示为默认的滚动条
        mouseWheel: true,
        scrollX:true,
        shrinkScrollbars: 'scale',
        fadeScrollbars: true,
    });

</script>
