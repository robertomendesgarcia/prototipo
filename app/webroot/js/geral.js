$(document).ready(function(){
    
    $("select, input, button, textarea, a.botao").not('input:file').uniform(); 	
        
    $('#adminMessage a').on('click', function(event){
        $('#adminMessage').fadeOut();
        event.preventDefault();
    });
    
    $('#NoticiaData').datepicker();
    $('#NoticiaData').mask("99/99/9999");

   

    $('#NoticiaImagens').uploadify({
        'swf': DEFAULT_URL + 'js/uploadify/uploadify.swf',
        'uploader': DEFAULT_URL + 'js/uploadify/uploadify.php',
        'buttonText': 'Selecione as imagens...',
        'width': 190,
        'height': 20,
        'auto': true,
        'removeCompleted': false
    }); 
    
  
    
    
});