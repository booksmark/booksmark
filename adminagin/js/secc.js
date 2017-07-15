/**
 * Created by ZHC on 2017/5/11.
 */
$(document).ready(function () {
    $('.left .biaoti').each(function (index,val) {
        $('span',val).on('click',function () {
            $(this).next('ul').stop(true,true).slideToggle(100)

        })
    })
})