$(document).ready(function() {

    if ($('div.galeria').length) {
        Shadowbox.init();
    }

    $('select, input, button, textarea').not('#barra_lateral div.busca input:submit').uniform();
//    $('#barra_lateral div.busca div.submit div.button span').;

    $.each($('#wrapper form .obrigatorio'), function(index, value) {
        $(this).prev('label').append('<span class="requerido"> *</span>');
    });

    var height_li = 0;
    $.each($('ul.listagem li'), function(index, value) {
        if ($(this).height() > height_li) {
            height_li = $(this).height();
        }
    });
    $('ul.listagem li').height(height_li);

    if ($('body#c-paginas.a-contato').length) {

        $('#ContatoNome').focus();

        $('#ContatoTelefone').mask('(99) 9999-9999?9');

        $('#form_contato').validate({
            rules: {
                'data[Contato][nome]': 'required',
                'data[Contato][email]': {
                    required: true,
                    email: true
                },
                'data[Contato][assunto]': 'required',
                'data[Contato][mensagem]': {
                    required: true,
                    maxlength: 600
                }
            },
            messages: {
                'data[Contato][nome]': 'Informe seu nome.',
                'data[Contato][email]': {
                    required: 'Informe seu e-mail.',
                    email: 'E-mail inválido.'
                },
                'data[Contato][assunto]': 'Informe o assunto.',
                'data[Contato][mensagem]': {
                    required: 'Informe sua mensagem.',
                    maxlength: 'Máximo de 600 caracteres.'
                }
            }
        });

    }

    if ($('body#c-paginas.a-trabalhe_conosco').length) {

        $('#CurriculoNome').focus();

        $('#CurriculoTelefone').mask('(99) 9999-9999?9');

        $('#form_trabalhe_conosco').validate({
            rules: {
                'data[Curriculo][nome]': 'required',
                'data[Curriculo][email]': {
                    required: true,
                    email: true
                },
                'data[Curriculo][mensagem]': {
                    required: true,
                    maxlength: 600
                },
                'data[Curriculo][curriculo]': 'required'
            },
            messages: {
                'data[Curriculo][nome]': 'Informe seu nome.',
                'data[Curriculo][email]': {
                    required: 'Informe seu e-mail.',
                    email: 'E-mail inválido.'
                },
                'data[Curriculo][mensagem]': {
                    required: 'Informe sua mensagem.',
                    maxlength: 'Máximo de 600 caracteres.'
                },
                'data[Curriculo][curriculo]': 'Envie seu currículo.'
            }
        });

    }

    if ($('#NewsletterAddForm').length) {

        $('#NewsletterAddForm').validate({
            rules: {
                'data[Newsletter][nome]': 'required',
                'data[Newsletter][email]': {
                    required: true,
                    email: true
                }
            },
            messages: {
                'data[Newsletter][nome]': 'Informe seu nome.',
                'data[Newsletter][email]': {
                    required: 'Informe seu e-mail.',
                    email: 'E-mail inválido.'
                }
            }
        });

    }


    $('#adminMessage').on('click', function(event) {
        $('#adminMessage').fadeOut();
        event.preventDefault();
    });

    $('div.banners a, a.nova_janela').on('click', function() {
        $(this).target = "_blank";
        window.open($(this).prop('href'));
        return false;
    });



//    $('#NoticiaData').datepicker();
//    $('#NoticiaData').mask("99/99/9999");
//    
//    if ($('body#c-configuracoes.a-admin_layout').length) {
//        
//        $('input:file').uniform({
////            fileButtonText: 'Selecione o arquivo',
////            fileDefaultText: 'Selecione...'
//        }); 
//        
//        var input = null;
//        var div_preview = null;
//        $('input.color_picker').ColorPicker({
//            color: '#FFFFFF',
//            onShow: function (colpkr) {
//                $(colpkr).fadeIn(500);
//                return false;
//            },
//            onHide: function (colpkr) {
//                $(colpkr).fadeOut(500);
//                return false;
//            },
//            onChange: function (hsb, hex, rgb) {
//                $(input).val('#' + hex);
//                $(div_preview).css('backgroundColor', '#' + hex);
//            },
//            onBeforeShow: function() {
//                input = this;
//                div_preview = $(this).next('div.preview');                
//            }
//        });
//        
//    }
//   
//    if ($('body#c-noticias.a-admin_add').length || $('body#c-noticias.a-admin_edit').length) {
//        $('#NoticiaImagens').uploadify({
//            'swf': DEFAULT_URL + 'js/uploadify/uploadify.swf',
//            'uploader': DEFAULT_URL + 'js/uploadify/uploadify.php',
//            'buttonText': 'Selecione as imagens...',
//            'width': 190,
//            'height': 20,
//            'auto': true,
//            'removeCompleted': false
//        }); 
//    }
//  


});


function carregarMapa(endereco) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({
        'address': endereco
    }, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
            var mapOptions = {
                zoom: 15,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            var map = new google.maps.Map(document.getElementById('mapa'), mapOptions);
            map.setCenter(results[0].geometry.location);
            var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
            });
        } else {
            alert("Não foi possível encontrar no mapa pelo seguinte motivo: " + status);
        }
    });

}