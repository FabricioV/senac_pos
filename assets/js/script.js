$(document).ready(function () {

    listar_log('');
    $("#form_ping").validate({
        rules: {
            input_ping: {required: true}
        },
        messages: {
            input_ping: {required: 'Campo Obrigatório'}
        },
        submitHandler: function () {

            var input_ping = $("#input_ping").val();

            $.ajax({
                url: "http://192.168.74.178/pos/Controller/ExecutarPing.php",
                dataType: "json",
                data: {input_ping: input_ping},
                type: 'POST',
                beforeSend: function () {
                    $(".alert-info").show();
                },
                success: function (data) {
                    $(".alert-info").hide();
                    console.log(data);
                    if (data.retorno) {

                        $(".ping-resultado p").html(data.dados);

                    } else {
                        $(".alert-danger p").html(data);
                        $(".alert-danger").show();
                    }

                }, error: function (data) {
                    $(".alert-info").hide();
                    $(".alert-danger p").html(data);
                    $(".alert-danger").show();
                    console.log(data);
                }

            });
            return  false;
        }
    });

    $("#form_search").validate({
        rules: {
            input_search: {required: true}
        },
        messages: {
            input_search: {required: 'Campo Obrigatório'}
        },
        submitHandler: function () {

            var input_search = $("#input_search").val();

            listar_log(input_search);
            return  false;
        }
    });


    function listar_log(search) {
        $.ajax({
            url: "http://192.168.74.178/pos/Controller/ListarLog.php",
            dataType: "json",
            type: 'POST',
            data: {input_search: search},
            beforeSend: function () {
                $(".alert-info").show();
            },
            success: function (data) {
                $(".alert-info").hide();
                console.log(data);
                if (data.retorno) {
                    $(".listar-log tbody").html('');
                    for (var i = 0; i < data.dados.length; i++) {
                        $(".listar-log tbody").append(
                                "<tr>" +
                                "<td>" + data.dados[i].id + "</td>" +
                                "<td>" + data.dados[i].descricao + "</td>" +
                                "</tr>"
                                );
                    }

                } else {
                    $(".listar-log tbody").html("<tr> <td colspan='2'>" + data.mensagem + " </td></tr>");

                }

            }, error: function (data) {
                $(".listar-log tbody").html("<tr> <td colspan='2'>" + data + " </td></tr>");
                console.log(data);
            }

        });
    }


});