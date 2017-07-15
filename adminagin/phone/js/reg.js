/**
 * Created by ZHC on 2017/6/19.
 */
$(document).ready(function(){
    $('.box').validate({
        rules:{
            user:{
                required:true,
                rangelength:[6,12]
            },
            pass: {
                required: true,
                rangelength:[6,12]
            },
           passagin:{
                required:true,
                equalTo: "#pass"
           },
            check:{
                required:true,
            },
            phone:{
                required:true
            }

        },
        messages:{
            user:{
                required:"请输入用户名",
                rangelength: $.validator.format("请输入长度在 {0} 到 {1} 之间的长度"),
            },
            pass:{
                required:"请输入密码",
                rangelength: $.validator.format("请输入长度在 {0} 到 {1} 之间的长度"),
            },
            passagin:{
                required:"请再次输入密码",
                equalTo:"两次密码不一致",
            },
            check:{
                required:"必填",
            }
            ,phone:{
                required:"必填",
            }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.parent().parent().find('.mess'));
            error.css({color:'red'})
        },

    })


})