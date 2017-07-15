<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 18:03
 */
include_once "header.php";
$id=$_REQUEST['id'];
$sql="select * from catacory WHERE parentid=$id and isshow=0";
$result=$db->query($sql);
$activeid=$_SESSION['activeid']=$id;
?>
<style>
    .main li{
        height: 50px;
        line-height: 50px;
        padding: 10px 0;
    }
</style>
    <ul class="container main">
        <?php while ($row=$result->fetch_assoc()):?>
            <li><a href="list.php?id=<?php echo $id?>&listid=<?php echo $row['cid']?>&name=<?php echo $row['name']?>"><?php echo $row['name']?></a></li>

        <?php endwhile;?>
    </ul>
<?php include_once "footer.php"?>
