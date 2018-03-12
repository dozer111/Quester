$(function () {


/*
===========================================================================================================
* Pop-up окно для редактирования текста
==========================================================================================================
*/

    $(".popup_bg").click(function(){	// Событие клика на затемненный фон
        $(".popup").fadeOut();	// Медленно убираем всплывающее окно
    });



    $('.btn-50').on('click',function () {
        // выбираем значения с блока-элемента
        var id=$(this).val();
        var title=$('#title'+id).text();
        var text=$('#text'+id).text();
        var img=$('#img'+id).attr('src');
        var userId=$('#userID'+id).html();
        // подставляю их же в форму, для статуса 2
        $('#admin_redact_title').val(title);
        $('#admin_redact_text').val(text);
        $('#admin_redact_picture').attr('src',img);
        $('#forAdminId').attr('value',id);
        $('#forAdminUserId').attr('value',userId);
        $(".popup").fadeIn(); // Медленно выводим изображение

    });

    /*
    *   Кнопки управления заданием
    *
    */
    var status=0;

    /*
                 1:подтвердить
                2:внесены изменения
                3: не подтверждено
     */
    $('.btn-100').on('click',function () {
        var id=$(this).val();
        status=1;

        $.ajax({
            url:"/admin/admin/change",
            type:"POST",
            data:{id:id,status:status},
            success:function (data) {
                console.log(data);
                alert(data);
            }
        });
    });




    $('.btn-0').on('click',function () {
        var id=$(this).val();
        status=3;

        $.ajax({
            url:"/admin/admin/change",
            type:"POST",
            data:{id:id,status:status},
            success:function (data) {
                console.log(data);
                alert(data);
            }
        });

    });












});