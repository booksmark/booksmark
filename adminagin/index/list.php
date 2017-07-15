<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 18:22
 */
include_once "header.php";
$listid=$_REQUEST['listid'];
$sql="select * from content WHERE cid=$listid";
$result=$db->query($sql);
$name=$_REQUEST['name'];
$id=$_REQUEST['id'];
?>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/list.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>







    <main class="container">
        <h1><?php echo $name?></h1>
        <ul class="list col-lg-12">
            <?php while ($row=$result->fetch_assoc()):?>
            <li>
                <div>
                    <a href=""><img src="<?php echo "../".$row['img']?>"></a>
                </div>
                <div>
                    <a href="content.php?id=<?php echo $id?>&conid=<?php echo $row['id']?>"><?php echo $row['title']?></a>
                    <p><?php echo $row['summary']?></p>
                    <div><a href="content.php?id=<?php echo $id?>&conid=<?php echo $row['id']?>">[详细]</a></div>
                </div>
            </li>
        <?php endwhile;?>


        </ul>



    </main>
<?php
include_once "footer.php";
?>