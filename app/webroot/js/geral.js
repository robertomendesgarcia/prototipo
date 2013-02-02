$(document).ready(function(){
    
    $('select, input, button, textarea, a.botao').not('input:file').uniform(); 	
    
    $('#centro form input').first().focus();

    $('#adminMessage a').on('click', function(event){
        $('#adminMessage').fadeOut();
        event.preventDefault();
    });
    
    $('#NoticiaData').datepicker();
    $('#NoticiaData').mask("99/99/9999");
    
    if ($('body#c-configuracoes.a-admin_layout').length) {
        
        $('input:file').uniform({
//            fileButtonText: 'Selecione o arquivo',
//            fileDefaultText: 'Selecione...'
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
        
    }
   
    if ($('body#c-noticias.a-admin_add').length || $('body#c-noticias.a-admin_edit').length) {
        $('#NoticiaImagens').uploadify({
            'swf': DEFAULT_URL + 'js/uploadify/uploadify.swf',
            'uploader': DEFAULT_URL + 'js/uploadify/uploadify.php',
            'buttonText': 'Selecione as imagens...',
            'width': 190,
            'height': 20,
            'auto': true,
            'removeCompleted': false
        }); 
    }
  
    
    
});