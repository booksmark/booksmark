/**
 * Created by ZHC on 2017/6/14.
 */
$(function(){
    let widths=0;
    let navbox=$(".floor2-top");
    $(".floor2-top li").each(function(index,attr){
        widths+=$(attr).outerWidth();
    })
    // 导航的宽为动态生成的宽
    navbox.css("width",widths);

    let left=0;
    //开始拖动时触发函数进行给marginleft赋初值
    mui(".floor2-top").on("dragstart",".floor2-top ",function(e){
        // 触发这个函数的时候 如果导航的marginleft有值的时候：0
        left=navbox.css("marginLeft")?navbox.css("marginLeft"):0;
        console.log(navbox.css("marginLeft"))
    })

    mui(".navbox").on("drag" ,".nav ",function(e){
        console.log(navbox.css("marginLeft"))
//			console.log(e.detail.deltaX);
//			deltaX:-31
//			deltaY:14
//			direction:"left"
        let add=parseInt(left)+e.detail.deltaX;	//将鼠标拖动的距离赋值给
        if(add>0){
            add=0;
        }
        console.log(add)
        if(add<$(window).width()-navbox.width()){
            add=$(window).width()-navbox.width();
        }
        navbox.css("marginLeft",add+"px");
    });
    console.log(navbox.width())
});