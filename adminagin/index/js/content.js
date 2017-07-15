/**
 * Created by ZHC on 2017/6/12.
 */
$(function () {


    $('.inputpl').on('click', function (e) {
        e.stopPropagation();
        if($(this).attr('cook')==0){
            $('.son').css("display","block").html(`<a href="logn.php">未登录，点击登录</a>`);
        }else {
            let cookieuse=$('.cookie').val();
            let user = $('.indexuser').val();
            let mess = $('.mess').val();
            let conid = $('.conid').val();
            let use = $('.us').val();
            let title = $('.title').val();
            if(mess==''){
                $('.son').css("display","block").html(`不能为空`);
                setInterval(function () {
                    $('.son').css("display","none");
                },2000)
            }else{
                if (cookieuse == user) {
                    $.ajax({
                        url: "pinlun.php",
                        data: {use: use, mess: mess, title: title, conid: conid},
                        success: function (data) {
                            if(data!="404"){
                                $('<li class="col-xs-12 li">').html(`
                                        <h4 class="col-xs-12">
                                           <span>来自:${use}</span>
                                           <em>${data}</em>
                                        </h4>
                                        <p class="col-xs-12">${mess}</p>
                                `).appendTo($('.pinlun'))
                            }
                            // 成功之后弹出提醒框
                            $('.son').css("display","block").html(`评论成功`);
                            setInterval(function () {
                                $('.son').css("display","none");
                            },2000)
                            // 赋空
                            $('.mess').val("");
                        }
                    })

                }
            }
        }

    })

})
