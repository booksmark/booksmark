<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/4
 * Time: 16:25
 */
$id=$_REQUEST['id'];
include_once 'lib/pulic.php';
$sql="select * from content WHERE id=$id";
$result=$db->query($sql);
$row=$result->fetch_assoc();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>修改内容</title>
</head>
<body>
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
//        ue.addListener("ready",function () {
//            setContent();
//        });
        setTimeout(function () {
            setContent();
        },200);

        function setContent() {
            let obj=document.querySelector('.con');
            let value=obj.innerHTML;
            UE.getEditor('editor').setContent(value);
        }

        document.querySelector('.del').onclick=function () {
            let id=this.id;
            let ajax=new XMLHttpRequest();
            ajax.onload=function () {
                console.log(ajax.response)
            }
            ajax.open("get",`ajax.php?id=${id}`);
            ajax.send();
            this.parentNode.remove(this)
        }
        let objs=new Upload();
        objs.up('addfile.php');

    }
</script>
<style>
    .con p{
        opacity: 0;
    }

</style>
<body>
<form action="editcontentcheck.php" method="post" enctype="multipart/form-data">
    <h4>修改内容</h4>
    <section>
        <h5>CID: </h5>
        <input type="hidden" name="id" value="<?php echo $id?>">
        <input type="text" name="cid" value="<?php echo $row['cid']?>">
    </section>
    <section>
        <h5>title:</h5>
        <input type="text" name="title" placeholder="<?php echo $row['title']?>">
    </section>
    <div><script name="con" id="editor" type="text/plain" style="width:600px;height:500px;"></script></div>
    <div class="con" style="opcity:0;"><?php echo $row['content']?></div>
    <div style="width:150px;height:200px;overflow:hidden;position:relative;">
        <input type="hidden" class="img" name="img" value="<?php echo $row['img']?>">
        <img src="<?php echo $row['img']?>" style="width:150px">
        <div id="<?php echo $row['id']?>" class="del" style="font-size:20px;width:20px;height:20px;line-height:20px;text-align:center;position:absolute;top:0;right:0">×</div>
    </div>
    <aside class="imgbox"></aside>
    <section>
        <h4>推荐位</h4>
        <?php
            $arr=explode(',',$row['pid']);




            $sql6="select * from createsqls.position";
            $result6=$db->query($sql6);
            while ($row6=$result6->fetch_assoc()):
                $brr=$row6['id'];

        ?>
        <div>
            <span><?php echo $row6['name']?></span>
            <input <?php if(isset($_REQUEST['id'])){if(in_array($brr,$arr)){echo "checked";}else{echo "1";}}?> type="checkbox" name="posi[]" value="<?php echo $row6['id']?>">
        </div>
        <?php endwhile;?>

    </section>
    <section>
        <input type="submit" value="确认修改">
    </section>
</form>
</body>
</html>
<script>
    var ue = UE.getEditor('editor');
</script>
