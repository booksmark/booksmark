<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 18:38
 */
include_once "header.php";
header('content-type:text/html;charset=utf8');
$db=new mysqli('localhost','root','','createsqls');
$db->query('set names utf8');
$contentid=$_REQUEST['conid'];
$sql="select * from content WHERE id=$contentid";
$result=$db->query($sql);
$row=$result->fetch_assoc();
$rowid=$row['id'];
?>
<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="css/content.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/content.js"></script>
<input type="hidden" class="cookie indexuser"  value="<?php echo @$_SESSION['user']?>">
    <main class="container">
            <h1><?php echo $row['title']?></h1>
            <h4><?php echo $row['time']?></h4>
            <?php echo $row['content']?>

        <h3>网友评论</h3>
        <?php
        $sql1="select * from message WHERE conid=$rowid";
        $result1=$db->query($sql1);
        ?>
        <ul class="container pinlun">
            <?php while ($row1=$result1->fetch_assoc()):?>
                <li class="col-xs-12 li" id="<?php echo  $row1['id']?>">
                    <h4 class="col-xs-12">
                       <span>来自：<?php echo  $row1['name']?></span>
                        <em><?php echo  $row1['time']?></em>
                    </h4>
                    <p class="col-xs-12"><?php echo $row1['content']?></p>
                </li>
            <?php endwhile;?>
        </ul>


            <section class="col-xs-12 form">
                <section class="son"></section>
                <div>
                    <span>网友评论</span>
                    <i>文明上网理性发言，请遵守新闻评论服务协议</i>
                </div>
                <textarea class="mess" name="mess" required></textarea>
                <section class="btnbox">
                    <input class="conid" type="hidden" name="conid" value="<?php echo $rowid?>">
                    <input class="us" type="hidden" name="use" value="<?php echo @$_SESSION['us']?>">
                    <input class="title" type="hidden" name="title" value="<?php echo $row['title']?>">
                    <input type="hidden" id="<?php echo $row['id']?>">
                    <input type="submit" value="提交评论" class="inputpl" cook="<?php if(isset($_SESSION['us'])){echo 1;}else{echo 0;}?>"/>
                </section>
            </section>

    </main>



<?php
include_once "footer.php";
?>
<script>
    let text=document.querySelector('textarea');
    text.value="";
</script>
