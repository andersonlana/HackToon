// document.addEventListener('DOMContentLoaded', function() {
//     const cepElement = document.getElementById('cep');
//     const telefoneElement = document.getElementById('telefone');

//     cepElement.addEventListener('blur', buscarEndereco);
//     cepElement.addEventListener('blur', MascaraCEP);
//     telefoneElement.addEventListener('blur', MascaraTelefone);

//     function buscarEndereco() {
//         const cep = cepElement.value; 
//         const url = `https://viacep.com.br/ws/${cep}/json/`;

//         if (cep.length != null) {
//             fetch(url)
//                 .then(response => response.json()) 
//                 .then(data => {
//                     if (data.erro) {
//                         document.getElementById('rua').value = 'CEP não encontrado!';
//                         document.getElementById('bairro').value = '';
//                         document.getElementById('cidade').value = '';
//                         document.getElementById('estado').value = '';
//                     } else {
//                         document.getElementById('rua').value = data.logradouro;
//                         document.getElementById('bairro').value = data.bairro;
//                         document.getElementById('cidade').value = data.localidade;
//                         document.getElementById('estado').value = data.uf;
//                     }
//                 })
//         } else {
//             alert('Por favor, insira um CEP válido com 8 dígitos.');
//         }
//     }

//     function MascaraCEP(event) {
//         let valor = event.target.value.replace(/\D/g, ''); 
//         if (valor.length > 5) {
//             valor = valor.replace(/(\d{5})(\d{1,})/, '$1-$2');
//         }
//         event.target.value = valor;
//     }
//     function MascaraTelefone(event) {
//         let valor = event.target.value.replace(/\D/g, '');

//         if (valor.length <= 10) {
//             valor = valor.replace(/(\d{2})(\d{4})(\d{4})/, '($1) $2-$3');
//         } else {
//             valor = valor.replace(/(\d{2})(\d{5})(\d{4})/, '($1) $2-$3');
//         }

//         event.target.value = valor; 
//     }
// });

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

