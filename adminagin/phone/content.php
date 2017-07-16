<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/14
 * Time: 13:44
 */
$id=$_REQUEST['id'];
include_once "pulic.php";
$sql="select * from content WHERE id=$id";
$result=$db->query($sql);
$row=$result->fetch_assoc();
include_once "header.php";
?>
<link rel="stylesheet" href="css/content.css">
    <main id="wrapper">
        <section class="box">
            <section class="one">
                <h4><?php echo $row['title']?></h4>
                <h5>时间：<?php echo $row['time']?></h5>
                <p>摘要：<?php echo $row['summary']?></p>
                <?php echo $row['content']?>
            </section>

            <article>
                <h3>相关新闻</h3>
                <ul class="new">
                    <?php
                    $id=$row['id'];
                    $keyword=$row['joins'];
                    $sqls="select * from content WHERE joins like '%{$keyword}%' AND NOT id=$id limit 0,3";
                    $results=$db->query($sqls);
                    if(mysqli_num_rows($results)>0){
                    while ($rows=$results->fetch_assoc()):
                        ?>
                        <li>
                            <a href="content.php?id=<?php echo $rows['id']?>&name=<?php echo $rows['title']?>">
                                <h4><?php echo $rows['title']?></h4>
                                <div><img src="../<?php echo $rows['img']?>"></div>
                            </a>
                        </li>
                    <?php endwhile;?>
                    <?php }else{?>
                        <p>没有更多内容了</p>
                    <?php }?>
                </ul>

<!--                评论-->
                <section class="messbox">
                    <h3 style="margin: 10px 0">评论</h3>
                    <ul class="mess">
                        <?php
                            $SQL="SELECT * FROM message WHERE conid=".$row['id'];
                            $RESULT=$db->query($SQL);
                            while ($ROW=$RESULT->fetch_assoc()):
                        ?>
                            <li>
                                <p><?php echo $ROW['content']?></p>
                                <div>
                                    <span><?php echo $ROW['name']?></span>
                                    <span><?php echo $ROW['time']?></span>
                                </div>
                            </li>
                        <?php endwhile;?>
                    </ul>
                    <div class="kuang"></div>
                </section>
            </article>

        </section>

    </main>
<footer class="message">
    <a href=
    <?php if(isset($_SESSION['u'])){?>
    "javascript:;" class="pinlun" id="<?php echo $row['id']?>" value="<?php echo $_SESSION['u']?>" title="<?php echo $row['title']?>"
    <?php }else{?>
    "login.php"
    <?php }
    $url='http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    $_SESSION['url']=$url;
    ?>
>
        <img src="img/liuyan%20line.png" alt="">
    </a>

</footer>
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

    
    $('.pinlun').on("touchend",function () {
        let id=$(this).attr('id');
        let user=$(this).attr('value');
        let title=$(this).attr('title');
        $('.messbox .kuang').html(`
                <textarea style="width: 100%;height: 100px;outline:none;resize: none;padding:0.12rem;box-sizing: border-box;border:1px solid #ccc;"></textarea>
                <button type="button" value="确认提交" style="width: 100%;height: 44px;line-height: 44px;text-align: center;border: none;background: #00a0e9;color: #fff;outline: none">确认提交</button>
        `)
        myScroll = new IScroll('#wrapper', {
            scrollbars: true,//是否显示为默认的滚动条
            mouseWheel: true,
            scrollX:true,
            shrinkScrollbars: 'scale',
            fadeScrollbars: true,
        });
        $('.messbox .kuang textarea').focus(function () {
            $(this).css("border","0.02rem solid #00a0e9")
        }).blur(function () {
            $(this).css("border","0.02rem solid #ccc")
        })
        $('.messbox .kuang button').on("touchend",function () {
            let con=$('.messbox .kuang textarea').val();
            $.ajax({
                url:"message.php",
                data:{id:id,con:con,user:user,title:title},
                success:function (data) {
                    if(data=="ok") {
                        $('.kuang').html('');
                        $('.mess').append($('<li>').html(`
                            <p>${con}</p>
                            <div>
                                <span>${user}</span>
                                <span>2017年6月18日15:52:52</span>
                            </div>
                        `))
                    }
                }
            })
        })
    });

</script>
