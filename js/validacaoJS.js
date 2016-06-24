$(function () {
    $("#desejaproduto").change(function () {
        if ($("#desejaproduto").is(':checked')) {
            $('#telefone').hide('slow');
            $('#internet').hide('slow');
            $('#tv').hide('slow');
        } else {
            $('#telefone').show('slow');
            $('#internet').show('slow');
            $('#tv').show('slow');
        }
    }
    );



    $(".cpf").mask("999.999.999-99");
    $(".cep").mask("99999-999");
    $(".telefone").mask("(99)99999-9999");
    $(".pwd_num").mask("999999");


    var mask = {
        money: function () {
            var el = this
                    , exec = function (v) {
                        v = v.replace(/\D/g, "");
                        v = new String(Number(v));
                        var len = v.length;
                        if (1 == len)
                            v = v.replace(/(\d)/, "0.0$1");
                        else if (2 == len)
                            v = v.replace(/(\d)/, "0.$1");
                        else if (len > 2) {
                            v = v.replace(/(\d{2})$/, '.$1');
                        }
                        return v;
                    };

            setTimeout(function () {
                el.value = exec(el.value);
            }, 1);
        }

    }



    $('#dinheiro').bind('keypress', mask.money)




    $('#cep').change(function () {
        var servico = "http://api.postmon.com.br/v1/cep/";
        var cep = $('#cep').val();

        function onCepDone(data) {
            $('#bairro').val(data.bairro);
            $('#endereco').val(data.logradouro);
            $('#endereco').append("  " + data.complemento);
        }


        function onCepError(error) {
            alert("Erro no Cep: " + error.statusText);
        }
        ;

        $.getJSON(servico + cep).done(onCepDone).fail(onCepError);

    });




    $('.formcliente').submit(function () {
        var telefone = $('#telefone').val();
        var tv = $('#tv').val();
        var internet = $('#internet').val();

        if (telefone.length < 1 && tv.length < 1 && internet.length < 1) {
            if ($("#desejaproduto").is(':checked')) {
                return true;
            } else {
                alert("Escolha algum Produto, ou marque que não deseja adicionar um!!");
                return false;
            }
        }
    });

    $('#senhaNovaRepete').change(function () {
        if ($('#senhaNovaRepete').val() != $('#senhaNova')) {
            $('#spanerro').text("As senhas não são iguais");
        }
    });



    $("input[name='cpf']").on('blur', function () {
        var cpf = $("input[name='cpf']").val();

        $.post('validacpf.php?cpf=' + cpf, function (data) {
            if (data != 1) {
                $('#cpfDiv').html(data);
                $('#cpfDiv').addClass("alert alert-danger");
                $('.btnSubmit').prop('disabled', true);
            } else {
                $('#cpfDiv').removeClass("alert alert-danger");
                $('#cpfDiv').html('');
                $('.btnSubmit').prop('disabled', false);
            }

        })

    })


});