$(document).ready(function(){
    
    $("select, input, button, textarea, a.botao").uniform(); 	
        
    $('#adminMessage a').on('click', function(event){
        $('#adminMessage').fadeOut();
        event.preventDefault();
    });
    
    $('#NoticiaData').datepicker();
    $('#NoticiaData').mask("99/99/9999");

  
    
  
    
    
    
});