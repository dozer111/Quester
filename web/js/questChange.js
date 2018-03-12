$(function(){


    var dateFilter=0;
    var userFilter=0;
    var emailFilter=0;
    function test() {
        $('.test').html('date='+dateFilter+'<br>user='+userFilter+'<br>'+'email='+emailFilter);
    }
    test();
    $('#filter_date_asc').on('click',function () {

        dateFilter='some test text';
        $('#filter_date_asc').removeClass('btn-primary').addClass('btn-success');
        $.ajax(
        {
            url:"/quest/getfilterdata/",
            type:"POST",
            data:{date:dateFilter},
            success:function (data) {
                $('.test').text(data);
            }

        });
    });

    $('.filter_userName').on('click',function () {


       $.ajax({
           url:"/quest/getfilterdata/",
           type:"POST",
           data:{login:login},
           success:function (data) {
               console.log(data);
               $('.test').text(data);
           }
       });



        $('.test').text(login);
    });
    $('.filter_email').on('click',function () {
       var email=$(this).text();
       $('.test').text(email);
    });








});