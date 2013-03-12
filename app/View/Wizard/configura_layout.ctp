<?php echo $this->Form->create('Layout'); ?>

        <fieldset>
    
    
        <legend>Passo 1</legend>
        <?php
        echo $this->Form->input('layout', array(
                                'type' => 'radio',
                                'options' => array('layout 1','layout 2','layout 3','layout 4')

                                ));
        
        ?>
        </fieldset>
        <fieldset>
            <legend>Passo 2</legend>
            <?php
                echo $this->Form->input('usa_produtos',array(
                                        'label' => 'Usa produto', 
                                        'type' => 'checkbox',
                                        ));
                echo $this->Form->input('usa_banners',array(
                                        'label' => 'Usa banner', 
                                        'type' => 'checkbox',
                                        ));
                echo $this->Form->input('usa_noticias',array(
                                        'label' => 'Usa not&iacute;cias', 
                                        'type' => 'checkbox',
                                        ));
                echo $this->Form->input('trabalhe_conosco',array(
                                        'label' => 'Trabalhe conosco', 
                                        'type' => 'checkbox',
                                        ));
                echo $this->Form->input('email_trabalhe_conosco',array(
                                        'label' => 'Email trabalhe conosco', 
                                        'type' => 'text',
                                        ));
            ?>
        </fieldset>
        <fieldset>
            <legend>Passo 3</legend>
            <?php
                echo $this->Form->input('logo',array(
                                        'label' => 'Logo', 
                                        'type' => 'file',
                                        ));  
                echo $this->Form->input('titulo_site',array(
                                        'label' => 'Titulo site', 
                                        'type' => 'text',
                                        ));
                echo $this->Form->input('slogan',array(
                                        'label' => 'Slogan', 
                                        'type' => 'text',
                                        ));
                echo $this->Form->input('email_contato',array(
                                        'label' => 'Email contato', 
                                        'type' => 'text',
                                        ));
                echo $this->Form->input('endereco_empresa',array(
                                        'label' => 'Endere&ccedil;o', 
                                        'type' => 'text',
                                        ));
            ?>
        </fieldset>

<?php echo $this->Form->end(__('Submit')); ?>