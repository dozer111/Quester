
$(function () {

    /**
     * Валидация формы для регистрации
     */

    var login='';
    var email='';
    var pass='';

    $('#signInS').on('mouseover',function () {
        login=$('#signInLogin').val();
        email=$('#signInEmail').val();
        pass=$('#signInPassword').val();

       $.ajax({
           url:"/auth/preSignIn",
           type:"POST",
            dataType:"json",
           data:{'login':login,'email':email,'password':pass},
           success:function (data) {
                var res=JSON.parse(data);
                if(res.error==1)
                {
                    $('#sign').attr('src','/auth/SignIn/');
                }
                alert(data);
               $('#result').text(data);
           }
       });
        if(login.length>5 && email.length>7 && pass.length>5)
        {

        }
        else
        {

        }
    });








});