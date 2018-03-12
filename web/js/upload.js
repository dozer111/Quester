$(function(){
    var form=$('#questForm');
    var formAdmin=$('#adminForm');

    formAdmin.on('submit',function (e) {
        e.preventDefault();
        var that=$(this);
        var formData=new FormData(that.get(0));

        $.ajax({
            url:"/admin/admin/change",
            type:"POST",
            data:formData,

            contentType:false,
            processData:false,
            success:function (data) {
                console.log(data);
                alert(data);
            }

        });


        return false;
    });


    form.on('submit',function (e) {
        e.preventDefault();
        var that=$(this);
        var formData=new FormData(that.get(0));

        $.ajax({
            url:"/main/create",
            type:"POST",
            data:formData,

            contentType:false,
            processData:false,
            success:function (data) {
                console.log(data);
            }

        });


        return false;
    });





});