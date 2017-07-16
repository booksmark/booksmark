/**
 * Created by ZHC on 2017/6/14.
 */
window.onload=function () {

    var height=$('#header').height()+$('.nav').height()+$('.banner').height();
    $('#wrapper').css("top",height+"px");


    var widths=0;
    var navbox=$(".navbox");
    $(".navbox a").each(function(index,attr){
        widths+=$(attr).outerWidth();
    });
    // 导航的宽为动态生成的宽
    navbox.css("width",widths);

    var left=0;
    //开始拖动时触发函数进行给marginleft赋初值
    mui(".navbox").on("dragstart",".navbox > a",function(e){
        // 触发这个函数的时候 如果导航的marginleft有值的时候：0
        left=navbox.css("marginLeft")?navbox.css("marginLeft"):0;
    })

    mui(".navbox").on("drag" ,".navbox > a",function(e){
        var add=parseInt(left)+e.detail.deltaX;	//将鼠标拖动的距离赋值给
        if(add>0){
            add=0;
        }
        if(add<$(window).width()-navbox.width()){
            add=$(window).width()-navbox.width();
        }
        navbox.css("marginLeft",add+"px");
    });


    var myScroll;

    myScroll = new IScroll('#wrapper', {});

    var num=0;
    var nub=0;
    myScroll.on("scrollEnd",function () {
//            如果这个等于0的时候 就说明最上面没内容了 该刷新啦
        var keyword=$('.new h4').attr('join');
        if(myScroll.y==0){
            $('.title').before($('<p class="ps">').css({width: "100%",height: "30px","font-size":"0.28rem","line-height": "30px","text-align": "center",color: "#999999"}).html('loading.....'));
            $.ajax({
                url:"loading.php",
                data:{keyword:keyword,nub:nub},
                dataType:'json',
                success:function (data) {
                    $('.ps').remove();
                    nub+=1;
                    if(data.length){
                    //     for(var i=0;i<data.length-1;i++){
                    //         $('<li>').html(`
                    //             <a href="content.php?id=${data.id}&title=${data.title}">
                    //                 <h4 join="${data.joins}">${data.title}</h4>
                    //             <div><img src="../${data.img}"></div>
                    //         </a>
                    //         `).prependTo($('.new'))
                    //     }
                        data.forEach(function (value) {
                            $('<li>').html(`
                                <a href="content.php?id=${value.id}&title=${value.title}">
                                    <h4 join="${value.joins}">${value.title}</h4>
                                <div><img src="../${value.img}"></div>
                            </a>
                            `).prependTo($('.new'))
                                });
//                        ajax获取到东西 列表盒子的高会发生变化 但是滚动条获取的高度发送AJAX之前的高  所以他的高度撑不开
//                        所以得在AJAX成功之后 重新实例化myScroll 以便滚动条获取高
                        myScroll = new IScroll('#wrapper', {});
                    }else {
                        $('.ps').remove();
                    }

                }
            })

        }
//            如果这个等于这个的时候 就说明往上滑到没内容了 该加载啦
        if(myScroll.y==myScroll.maxScrollY){
            $.ajax({
                url:"jiazai.php",
                data:{num:num},
                dataType:'json',
                success:function (data) {
                    if(data.length){
                        num+=5;
                        data.forEach(function (value) {
                            $('<li>').html(`
                        <a href="content.php?id=${value.id}&title=${value.title}">
                            <h4 join="${value.joins}">${value.title}</h4>
                        <div><img src="../${value.img}"></div>
                    </a>
                    `).appendTo($('.new'))
                        })
//                        ajax获取到东西 列表盒子的高会发生变化 但是滚动条获取的高度发送AJAX之前的高  所以他的高度撑不开
//                        所以得在AJAX成功之后 重新实例化myScroll 以便滚动条获取高
                        myScroll = new IScroll('#wrapper', {click:true});
                    }else {
                        let p=$('.p');
                        p.html(`没有更多内容了`).appendTo($('.new'));
                        p.css("display","block");
                        setTimeout(function () {
                            p.css("display","none")
                        },1000)
                    }


                }
            })
        }

    });

};
