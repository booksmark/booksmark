/**
 * Created by ZHC on 2017/6/14.
 */
$(function () {
    var back=$('header span:first-child');
    back.on("touchend",function () {
        window.history.back()
    })
})
