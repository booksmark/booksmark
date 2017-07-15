/**
 * Created by ZHC on 2017/6/4.
 */
$(function () {
    let tbody=$('tbody');
    $('#sel').change(function () {
        let id=$('#sel').val()
        $.ajax({
            url:"managecon.php",
            dataType:'Json',
            data:{id:id},
            success:function (data){
                tbody.html('');
                data.forEach(function (value) {
                    $('<tr>').html(`
                        <td>${value.id}</td>
                        <td>${value.title}</td>
                        <td><textarea>${value.content}</textarea></td>
                        <td>${value.time}</td>
                        <td><img src="${value.img}" alt=""></td>
                        <td>${value.cid}</td>
                        <td>${value.pid}</td>
                        <td>
                        <a href="editcontent.php?id=${value.id}">修改</a>
                        <a href="delcontent.php?id=${value.id}">删除</a>
    </td>
                    `).appendTo(tbody)
                })

            }
        })
    })
    $('#sel').triggerHandler('change');
})