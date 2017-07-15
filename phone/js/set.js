/**
 * Created by ZHC on 2017/6/16.
 */
$(document).ready(function(){
    $('.box').validate({
        rules:{
            nickname:{
                required:true,
                rangelength:[6,10]
            },
            email: {
                required: true,
                email: true
            },
            age:true,
            sex:{
                required:true,
                maxlength:1
            }

        },
        messages:{
            nickname:{
                required:"请输入昵称",
                rangelength: $.validator.format("请输入长度在 {0} 到 {1} 之间的长度"),
            },
            email: "请输入一个正确的邮箱",
            age:"请输入正确的年龄",
            sex:"请输入正确的性别"
        },
        errorPlacement: function(error, element) {
            // console.log(error,element)
            error.appendTo(element.parent().parent().find('.mess').children());
            error.css({color:'red'})
        },

    })


})
