$(document).ready(function () {


    $("#form_login").validate({
        rules: {
            login_usuario: {required: true},
            login_senha: {required: true}
        },
        messages: {
            login_usuario: {required: 'Campo Obrigatório'},
            login_senha: {required: 'Campo Obrigatório'}
        },
        submitHandler: function () {

            var login_usuario = $("#login_usuario").val();
            var login_senha = $("#login_senha").val();

            $.ajax({
                url: "http://192.168.74.178/pos/Controller/Login.php",
                dataType: "json",
                data: {usuario: login_usuario, senha: login_senha},
                type: 'POST',
                beforeSend: function () {
                    $(".alert-info").show();
                },
                success: function (data) {
                    $(".alert-info").hide();
                    console.log(data);
                    if (data.retorno) {

                       window.location.href = "admin/";

                    } else {
                        $(".alert-danger strong").html(data.mensagem);
                        $(".alert-danger").show();
                    }

                }, error: function (data) {
                    $(".alert-info").hide();
                    $(".alert-danger stong").html(data);
                    $(".alert-danger").show();
                    console.log(data);
                }

            });
            return  false;
        }
    });




});