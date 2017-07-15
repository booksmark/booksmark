<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/3
 * Time: 18:18
 */
include_once "lib/pulic.php";
include_once "lib/class.php";
$obj=new TREE();
$obj->trees(0,-1,'&nbsp'.'&nbsp'.'└',$db,'catacory');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

        <?php echo $obj->str?>

</body>
</html>
