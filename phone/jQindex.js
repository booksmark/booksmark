/**
 * Created by ZHC on 2017/6/11.
 */
$(function () {
    let firstid;
    $(document).queue('fx',function () {
        $.ajax({
            url:'sel.php',
            dataType:'json',
            success:function (data) {

                data.forEach(function(value,index){
                    if(index==0){
                        $(`<li class="active" id="${value.cid}"></li>`).html(`${value.name}`).appendTo($('.list'));
                        firstid=value.cid;

                    }else {
                        $(`<li id="${value.cid}"></li>`).html(`${value.name}`).appendTo($('.list'))
                    }

                })
                $(document).dequeue();
            }
        })
    })
    $(document).queue('fx',function () {
        gitid(firstid)
    })

    $('.list').delegate('li','click',function () {
        let id=$(this).attr('id');
        $(this).addClass('active').siblings().removeClass('active')
        gitid(id);
    })

    function gitid(id) {
        let con=$('.con');
        $.ajax({
            url:'index-ajaxlist.php',
            dataType:'json',
            data:{id:id},
            success:function (data) {
                con.html('');
                let len=data.length;
                for(let i=0;i<len;i++){
                    $('<li>').html(`
                    <div>
                        <a href="content.php?id=10&conid=${data[i].id}"><img src="../${data[i].img}"></a>
                    </div>
                    <div>
                        <a href="content.php?id=10&conid=${data[i].id}">${data[i].title}</a>
                        <p>${data[i].summary}</p>
                    </div>
                `).appendTo(con)
                }
            }
        })
    }
})