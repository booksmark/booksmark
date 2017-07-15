<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/12
 * Time: 14:26
 */
include_once "header.php";
$sqla="select * from content WHERE id=".$_REQUEST['conid'];
$resulta=$db->query($sqla);
$rowa=$resulta->fetch_assoc();

?>
<style>
    .h4{
        text-align: center;
        height: 60px;
        line-height: 60px;
        color: #222;
        font-size: 36px;
    }
    p{
        text-indent: 2em;
    }
</style>
    <main class="container">
        <h2 class="col-xs-12 h4"><?php echo $rowa['title']?></h2>
        <?php
            echo $rowa['content'];
        ?>
    </main>
<?php
    include_once "footer.php"
?>