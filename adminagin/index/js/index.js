$(document).ready(function(){
//	时间
	let time = new Date();
	let year=time.getFullYear();
	let month=time.getMonth()+1;
	let day=time.getDate();
	$('.floor1-left>div>span').html(`${year}年${month}月${day}日`)
	

// 	导航栏
	let mouse=$('.bignav .bigli');
    mouse.each(function () {
		$(this).hover(function () {
			$(this).find('.minnav').stop(true);
			$(this).css('background','#317CAF');
            $(this).find('.minnav').slideDown(200)
        },function () {
            $(this).find('.minnav').stop(true);
            $(this).find('.minnav').slideUp(200);
            $(this).css('background','#5AA5D8');
        })
    })
});
