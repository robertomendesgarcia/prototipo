<?php
$titulo = explode(' - ', $title_for_layout);
$this->Html->addCrumb($titulo[0]);
?>

<?php echo $this->Form->create('Noticia', array('type' => 'file')); ?>

<fieldset>
      <?php
      echo $this->Form->input('titulo', array('label' => __('Title:')));
      echo $this->Form->input('categoria_id', array('label' => __('Category:'), 'type' => 'select', 'options' => $categorias, 'empty' => 'Selecione...'));
      echo $this->Form->label('texto', __('Content:'));
      echo $this->Form->textarea('texto', array('class' => 'ckeditor'));
      echo $this->Form->input('fonte', array('label' => __('Source:')));
      echo $this->Form->input('data', array('label' => __('Date:'), 'type' => 'text', 'dateFormat' => 'dd/mm/YYYY', 'class' => 'data'));
      echo $this->Form->input('destaque', array('label' => __('Destaque:'), 'type' => 'select', 'options' => array(
              '1' => __('Yes'),
              '0' => __('No')
              )));
      echo $this->Form->input('ativo', array('label' => __('Active:'), 'type' => 'select', 'options' => array(
              '1' => __('Yes'),
              '0' => __('No')
              )));
      echo $this->Form->label('imagens', 'Galeria:');
      echo $this->Form->input('imagens.', array('type' => 'file', 'multiple' => 'multiple'));
      ?>
</fieldset>

<div class="botoes">
      <?php //echo $this->Form->submit(__('Submit'), array('div' => false)); ?>
      <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_gravar.png" alt="submit">
      <?php echo $this->Form->end(); ?>
      <?php echo $this->Form->postLink(__('Cancel'), array('action' => 'index'), array('class' => 'cancelar'), __('Do you really want to cancel this news?')); ?>
</div>

<!--
<script type = "text/javascript">
      $(function() {
<?php //$timestamp = time(); ?>
                        $('#NoticiaImagens').uploadify({
                              'swf': DEFAULT_URL + 'js/uploadify/uploadify.swf',
                              'uploader': DEFAULT_URL + 'js/uploadify/uploadify.php',
                              'auto' : true,
                              'width': 190,
                              'height': 20,
                              'buttonText' : 'Selecione as imagens',
                              'multi' :true,
                              'queueSizeLimit' : 5,
                              'sizeLimit' : 1024*1024,
                              'removeCompleted': false
                             
                  });
            });
</script>
<script type = "text/javascript">
      $(function(){
        $('#swfupload-control').swfupload({
                upload_url: "upload-file.php",
                file_post_name: 'uploadfile',
                file_size_limit : "1024",
                file_types : "*.jpg;*.png;*.gif",
                file_types_description : "Image files",
                file_upload_limit : 5,
                flash_url : "js/swfupload/swfupload.swf",
                button_image_url : 'js/swfupload/wdp_buttons_upload_114x29.png',
                button_width : 114,
                button_height : 29,
                button_placeholder : $('#button')[0],
                debug: false
        })
                .bind('fileQueued', function(event, file){
                        var listitem='<li id="'+file.id+'" >'+
                                'File: <em>'+file.name+'</em> ('+Math.round(file.size/1024)+' KB) <span class="progressvalue" ></span>'+
                                '<div class="progressbar" ><div class="progress" ></div></div>'+
                                '<p class="status" >Pending</p>'+
                                '<span class="cancel" >&nbsp;</span>'+
                                '</li>';
                        $('#log').append(listitem);
                        $('li#'+file.id+' .cancel').bind('click', function(){ //Remove from queue on cancel click
                                var swfu = $.swfupload.getInstance('#swfupload-control');
                                swfu.cancelUpload(file.id);
                                $('li#'+file.id).slideUp('fast');
                        });
                        // start the upload since it's queued
                        $(this).swfupload('startUpload');
                })
                .bind('fileQueueError', function(event, file, errorCode, message){
                        alert('Size of the file '+file.name+' is greater than limit');
                })
                .bind('fileDialogComplete', function(event, numFilesSelected, numFilesQueued){
                        $('#queuestatus').text('Files Selected: '+numFilesSelected+' / Queued Files: '+numFilesQueued);
                })
                .bind('uploadStart', function(event, file){
                        $('#log li#'+file.id).find('p.status').text('Uploading...');
                        $('#log li#'+file.id).find('span.progressvalue').text('0%');
                        $('#log li#'+file.id).find('span.cancel').hide();
                })
                .bind('uploadProgress', function(event, file, bytesLoaded){
                        //Show Progress
                        var percentage=Math.round((bytesLoaded/file.size)*100);
                        $('#log li#'+file.id).find('div.progress').css('width', percentage+'%');
                        $('#log li#'+file.id).find('span.progressvalue').text(percentage+'%');
                })
                .bind('uploadSuccess', function(event, file, serverData){
                        var item=$('#log li#'+file.id);
                        item.find('div.progress').css('width', '100%');
                        item.find('span.progressvalue').text('100%');
                        var pathtofile='<a href="uploads/'+file.name+'" target="_blank" >view &raquo;</a>';
                        item.addClass('success').find('p.status').html('Done!!! | '+pathtofile);
                })
                .bind('uploadComplete', function(event, file){
                        // upload has completed, try the next one in the queue
                        $(this).swfupload('startUpload');
                })	
});

</script>-->