<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/14
 * Time: 11:49
 */

include_once "pulic.php";
$cid=$_REQUEST['id'];
$sql="SELECT catacory.name,content.title,content.summary,content.id,content.img FROM catacory,content WHERE catacory.cid=$cid AND content.cid=$cid";
$result=$db->query($sql);
?>
<?php include_once "header.php"?>
<link rel="stylesheet" href="css/list.css">
    <main id="wrapper">
        <ul class="ul">
            <?php while ($row=$result->fetch_assoc()):?>
            <li>
                <a href="content.php?id=<?php echo $row['id']?>&name=<?php echo $row['title']?>">
                    <section>
                        <h4><?php echo $row['title']?></h4>
                        <p><?php echo $row['summary']?></p>
                    </section>
                    <div class="imgbox">
                        <div> <img src="../<?php echo $row['img']?>">  </div>

                    </div>
                </a>
            </li>
            <?php endwhile;?>
        </ul>
    </main>
<?php include_once "footer.php"?>
<script>
window.onload=function () {
    myScroll = new IScroll('#wrapper', {
//        scrollbars: true,//是否显示为默认的滚动条
        mouseWheel: true,
        scrollX:true,
        shrinkScrollbars: 'scale',
        fadeScrollbars: true,
    });
}
</script>
