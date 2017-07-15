<?php
/**
 * Created by PhpStorm.
 * User: ZHC
 * Date: 2017/6/14
 * Time: 22:19
 */
?>
<footer id="footer">
    <ul>
        <li><a class="iconfont" href="resopose.php">&#xe60c;</a></li>
        <li><a class="iconfont" href="search.php">&#xe606;</a></li>
        <li><a class="iconfont" href="about.php?id=8&conid=35&name=关于我们">&#xe668;</a></li>
    </ul>
</footer>

</body>
</html>
<script>
    $('#footer a').on("touchend",function () {
        $(this).addClass('active').siblings().removeClass('active')
    })
</script>