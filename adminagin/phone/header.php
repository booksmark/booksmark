<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/14
 * Time: 22:41
 */
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Headline</title>
    <script src="js/jquery.js"></script>
    <script src="js/back.js"></script>
    <script src="js/iscroll.js"></script>
    <script src="js/common.js"></script>
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/footer.css">
</head>
<body>
<header id="header">
    <span>&lt;</span>
    <div><?php echo $_REQUEST['name']?></div>
    <span>
        <?php if(isset($_SESSION['u'])){
            echo '<a href="preson.php" style="padding: 0"><img src="img/user.png"></a>';
        }else{
            echo '<a href="login.php" style="padding: 10px"><img src="img/ren.png"></a>';
        }?>

    </span>
</header>

