$(document).ready(function(){
    
    //    $('select, input, button, textarea, a.botao').not('input:file').uniform(); 	
    $('input:file').uniform(); 	
    
    $('form input').first().focus();

    $('#adminMessage').on('click', function(event){
        $('#adminMessage').fadeOut();
        event.preventDefault();
    });
    
    $.each($('#wrapper form input.obrigatorio'), function(index, value){
        $(this).prev('label').append('<span class="requerido"> *</span>');
    });
    
    // $('#NoticiaData').datepicker();
    // $('#NoticiaData').mask("99/99/9999");
   
    // crie uma classe pois é utilizado em mais de um lugar
    $('.data').mask("99/99/9999");
    $('.data').datepicker({
        dateFormat: 'dd/mm/yy'
    });
    
    $('fieldset.galeria ul li a.excluir').on('click', function(){
        if (confirm('Deseja realmente excluir esta imagem?')) {
            return true;   
        } else {
            return false;   
        }
    });
    
    if ($('body#c-configuracoes').length) {
        
        //        config.toolbar_Basic = [
        //        ['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About']
        //        ];        
        //        CKEDITOR.editorConfig(['Bold', 'Italic', '-', 'NumberedList', 'BulletedList', '-', 'Link', 'Unlink','-','About']);
        //        CKEDITOR.tools = 'Basic';
        
        toogleCampos();
        $('#ConfiguracaoUsaProdutos, #ConfiguracaoUsaNoticias').on('change', function(){
            toogleCampos();
        });
        
        var input = null;
        var div_preview = null;
        $('input.color_picker').ColorPicker({
            color: '#FFFFFF',
            onShow: function (colpkr) {
                $(colpkr).fadeIn(500);
                return false;
            },
            onHide: function (colpkr) {
                $(colpkr).fadeOut(500);
                return false;
            },
            onChange: function (hsb, hex, rgb) {
                $(input).val('#' + hex);
                $(div_preview).css('backgroundColor', '#' + hex);
            },
            onBeforeShow: function() {
                input = this;
                div_preview = $(this).next('div.preview');                
            }
        });
        
        $('input.color_picker').each(function(){
            if ($(this).val()) {
                $(this).next('div.preview').css('backgroundColor', $(this).val());
            }
        });
        
    }
    
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
  
    
    
});

function toogleCampos(){
    if ($('#ConfiguracaoUsaProdutos').is(':checked') || $('#ConfiguracaoUsaNoticias').is(':checked')) {
        $('div.campos input, select').removeAttr('disabled');
    } else {
        $('div.campos input, select').attr('disabled', true);
    }
}