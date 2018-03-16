$(function(){



// ======================================================================================================================
// ======================================================================================================================
    // Создание AJAX для выгрузки и получения данных


    /**
     * =================================================================================================================
     * Функцию нужно вызывать так
     * load_data(pageNumber,emailString||false,userId||false,orderType||false)
     *                                      ===> load_data(1,false,false,false)
     *                                      ===> load_data(1,'test@test.test',false,false
     *                                      ===> load_data(1,'test2@test.test',false,'ASC')
     * =================================================================================================================
     */
    page=($('.page_number').attr('ttt'));
    function load_data(page,param1,param2,param3)
    {
        /**
         * param1 --> фильтр  @mail
         * param2 --> фильтр по пользователям
         * param3 --> фильтр по дате
         * =====================================
         * Можно использовать как:
         * 1+3
         * 2+3
         * 3
         * по пользователю + маилу пока одновременно нельзя
         * =====================================
          */

            // валидация ввода странички
        var page=(isNaN(page)!=true)?page:1;
        var filter1=(param1=='00')?false:param1;
        var filter2=(param2=='00')?false:param2;
        var filter3=(param3=='no')?false:param3;

        //alert('filter1 ==> '+filter1+' filter2 ==> '+filter2+' filter3 ==> '+filter3);



                $.ajax({
                    url:"/quest/getfilterdata/",
                    type:"POST",
                    data:
                        {
                            page:page,
                            filter1:filter1,
                            filter2:filter2,
                            filter3:filter3
                        },
                    success:function (data) {
                        //1 распашиваем ответ
                         var clientData=JSON.parse(data);
                        
                   


                         //кнопки пагинации
                         // к-во кнопок

                        var countPaginationButton = clientData.pages.list.length;
                        // pagination ==> HTML код для ссылок на пагинацию
                        var pagination = '';
                        // оставляем информацию о текущей странице
                        $('.pagination_link_a').attr('id',clientData.currentPage).text(clientData.currentPage);

                            for (var i = 0; i < countPaginationButton; i++) {

                            if(clientData.pages.list[i]==clientData.currentPage)
                                pagination += '<button  class="pagination_link pagination_button_active" id="' + clientData.pages.list[i] + '">' + clientData.pages.list[i] + '</button>'
                            else
                                pagination += '<button  class="pagination_link" id="' + clientData.pages.list[i] + '">' + clientData.pages.list[i] + '</button>';

                        }
                        // вывод кнопок с пагинацией
                        $('.pagination_main').html(pagination);


                        // вытягиваю данные в массиве заданий
                        var itemCount=clientData.items.length;
                        var itemString = "";
                        for (var i = 0; i < itemCount; i++) {
                            // помещаем каждый итем в контейнер
                            itemString+='<div class="quest_element">';

                            // устанавливаю значение для картинки
                            var itemImage=(clientData.items[i].quest_picture.length > 0)
                                ?'../../web/img/'+clientData.items[i].quest_picture:'../../web/img/default.jpg';
                            var itemTitle=clientData.items[i].quest_title;
                            itemString += "<img src='"+itemImage+"' class='quest_picture_short' alt='"+itemTitle+"'> ";
                            // ссылка с назваением задания для перехода
                            itemString += "<a class='quest_link' href='/quest/show/"+clientData.items[i].id+"'>" + clientData.items[i].quest_title + "</a>";
                            itemString += "<p class='quest_text'>" + clientData.items[i].quest_text + "</p>";
                            // нижний блок с автором и/или @mail
                            if(clientData.items[i].quest_author!='0')
                            {
                                itemString += "<h2 class='filter_userId'>" + clientData.items[i].user_login + "</h2>";
                            }
                            else
                            {
                                itemString += "<h2 class='filter_userId'>Guest </h2>";
                                itemString += "<h2 class='filter_email'>" + clientData.items[i].quest_email + "</h2>";
                            }

                            itemString+="</div>";
                        }
                        $('.quest_container').text(data);
                        $('.quest_container').html(itemString);
                        // console.log(clientData);
                        $('.page_number').attr('ttt',page).text(clientData.currentFilter);
                            
                            
                            
                            
                            
                            
                            
                            


                    }

                });

    }



    load_data(page,'00','00',$('.page_number').text());
// ==================================================================================================================
//                      Переход по ссылкам
// ==================================================================================================================
    $(document).on('click','.pagination_link',function () {
        var pageToGoNumber=$(this).attr('id');
        var filter=$('.page_number').text();
        load_data(pageToGoNumber,'00','00',filter);
    });

//====================================================================================================================
// Примечание к фильтрации:
// При клике на вход дополнительно считываетсЯ информация с .page_number:
//    ttt --> номер текущей странички
//    текст внутри --> фильтр данных
// ====================================================================================================================



// ==================================================================================================================
//                     Фильтрация по @mail
// ==================================================================================================================
   $(document).on('click','.filter_email',function () {
       var filter=$('.page_number').text();
       var email=$(this).text();
       load_data(page,email,'00',filter);
   });

// ==================================================================================================================
//                      Фильтрация по юзеру
// ==================================================================================================================
    $(document).on('click','.filter_userId',function () {
       var userId=$(this).text();
        var filter=$('.page_number').text();
       load_data(page,'00',userId,filter);

    });



// ==================================================================================================================
//                      Дополнитеная ASC/DESC фильтрация
// ==================================================================================================================
    $(document).on('click','.filter_date_asc',function () {

        var userId=$(this).text();
        var filter=$('.page_number').text();
        switch (filter)
        {
            case 'no':
                load_data(page,'00','00','ASC');
            break;
            case 'email':
                var emailName=$('.filter_email:first-child').text();
                load_data(page,emailName,'00','ASC');
            break;
            case 'id':
                var idNumber=$('.filter_userId:first-child').text();
                load_data(page,'00',idNumber,'ASC');
            break;
        }
    });

    $(document).on('click','.filter_date_desc',function () {

        var userId=$(this).text();
        var filter=$('.page_number').text();

        switch (filter)
        {
            case 'no':
                // alert('no');
                load_data(page,'00','00','DESC');
                break;
            case 'email':
                // alert('email');
                var emailName=$('.filter_email:first-child').text();
                load_data(page,emailName,'00','DESC');
                break;
            case 'id':
                // alert('id');
                var idNumber=$('.filter_userId:first-child').text();
                load_data(page,'00',idNumber,'DESC');
                break;
        }
    });










});