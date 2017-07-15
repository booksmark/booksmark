<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/3
 * Time: 16:53
 */
//$id=$_REQUEST['id'];
$cid=$_REQUEST['cid'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>添加内容</title>
</head>
<script type="text/javascript" charset="utf-8" src="utf8-php/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="utf8-php/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="utf8-php/lang/zh-cn/zh-cn.js"></script>

<link rel="stylesheet" href="css/common.css">
<link rel="stylesheet" href="css/addcontent.css">

<script src="js/addcontent.js"></script>
<script>
    window.onload=function () {
        let obj=new Upload();
        obj.up('addfile.php');
    }

</script>
<body>
    <form action="addcontentcheck.php" method="post" enctype="multipart/form-data">
        <h4>添加内容</h4>
        <section>
            <h5>CID: </h5>
            <input type="hidden" name="cids" value="<?php echo $cid?>">
            <input type="text" name="cid" value="<?php echo $cid?>">
        </section>
        <section class="section">
            <input type="text" name="title" placeholder="标题">
        </section>


        <aside>
            <input type="hidden" name="img" class="img" >
        </aside>


        <div><script name="con" id="editor" type="text/plain" style="width:600px;height:500px;"></script></div>
        <section>
            <h4>推荐位：</h4>
            <?php
            include_once "lib/pulic.php";
                $sql5="select * from createsqls.position";
                $result5=$db->query($sql5);
                while ($row5=$result5->fetch_assoc()){
            ?>
            <div>
                <span><?php echo $row5['name']?></span>
                <input type="checkbox" name="posi[]" value="<?php echo $row5['id']?>">
            </div>
            <?php }?>
        </section>
        <section class="section">
            <input type="submit" value="确认添加">
        </section>
    </form>
</body>
</html>
<script>
    var ue = UE.getEditor('editor');
</script>