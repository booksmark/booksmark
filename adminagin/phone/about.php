<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/14
 * Time: 22:40
 */
include_once "header.php";
include_once "pulic.php";
$conid=$_REQUEST['conid'];
$sql="select * from content WHERE id=$conid";
$result=$db->query($sql);
$row=$result->fetch_assoc();
?>
<script></script>
<link rel="stylesheet" href="css/about.css">
<main id="wrapper">
    <section>
        <h3>About US</h3>
        <?php echo $row['content']?>
    </section>
</main>

<?php include_once "footer.php"?>
<script>
    window.onload=function () {
        myScroll = new IScroll('#wrapper', {
//            scrollbars: true,//是否显示为默认的滚动条
            mouseWheel: true,
            scrollX:true,
            shrinkScrollbars: 'scale',
            fadeScrollbars: true,
        });
    }

</script>
