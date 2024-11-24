$(document).ready(function() {
    $("input[name=cep]").blur(function() {
        var cep = $(this).val().replace(/[^0-9]/g, ''); 
        if (cep.length === 8) {
            var url = 'https://viacep.com.br/ws/' + cep + '/json/';
            $.ajax({
                url: url,
                dataType: 'jsonp',
                crossDomain: true,
                contentType: "application/json",
                success: function(json) {
                    if (json.logradouro) {
                        $("input[name=rua]").val(json.logradouro);
                        $("input[name=bairro]").val(json.bairro);
                        $("input[name=cidade]").val(json.localidade);
                        $("input[name=estado]").val(json.uf);
                    } else {
                        alert("CEP não encontrado!");
                    }
                },
                error: function() {
                    alert("Erro ao buscar o CEP.");
                }
            });
        } else {
            alert("Por favor, insira um CEP válido com 8 dígitos.");
        }
    });
      
    if($('.mascara-telefone').length > 0) {
        var options = {
            onKeyPress: function(phone, e, field, options) {
               var masks = ['(00) 0000-00000', '(00) 00000-0000'];
                var mask = (phone.length > 14) ? masks[1] : masks[0];
                $('.mascara-telefone').mask(mask, options);
            } 
        }

        $('.mascara-telefone').mask('(00) 0000-00000', options);
    }

    $('#cep').mask('00000-000');

    $(".apenasLetra").on("input", function(){
        var regexp = /[^a-zA-ZáÁâÂàÀãÃéÉêÊíÍóÓôÔõÕúÚüÜçÇ\s]/g; 
        if (this.value.match(regexp)) {
            $(this).val(this.value.replace(regexp, ''));
        }
    });

    $('.apenasNumero').bind('input', function(e){
        if (e.keyCode < 47 || e.keyCode > 57) { 
            alert("Este é um campo apenas numérico.");
            $(this).val(""); 
        }
    });
});

