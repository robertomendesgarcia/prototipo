
<div id="menu" class="<?php echo ($tipo == 1) ? 'topo' : 'esquerda'; ?>">
    <ul>

        <?php
        if (isset($opcoes_menu)) {
            foreach ($opcoes_menu as $opcao_menu) {
                ?>
                <li>
                    <a href="<?php echo DEFAULT_URL . 'paginas/' . $opcao_menu['Pagina']['pin']; ?>" title="<?php echo __($opcao_menu['Pagina']['titulo']); ?>"><?php echo __($opcao_menu['Pagina']['titulo']); ?></a>
                </li>
                <?php
            }
        }
        ?>   

        <?php if ($config['usa_produtos']) { ?>
            <li>
                <a href="<?php echo DEFAULT_URL; ?>produtos" title="<?php echo __('Products'); ?>"><?php echo __('Products'); ?></a>

                <ul>

                    <?php foreach ($produto_categorias as $categoria) { ?>
                    
                        <li>
                            
                            <a href="<?php echo DEFAULT_URL; ?>produtos/categoria/" title="<?php echo $categoria['ProdutoCategoria']['nome']; ?>"><?php echo $categoria['ProdutoCategoria']['nome']; ?></a>            
                            

                        </li>

                    <?php } ?>

                </ul>



            </li>
        <?php } ?>   

        <?php if ($config['usa_noticias']) { ?>
            <li>
                <a href="<?php echo DEFAULT_URL; ?>noticias" title="<?php echo __('News'); ?>"><?php echo __('News'); ?></a>
            </li>
        <?php } ?>          

        <?php if ($config['usa_trabalhe_conosco']) { ?>
            <li>
                <a href="<?php echo DEFAULT_URL; ?>trabalhe-conosco" title="<?php echo __('Work with us'); ?>"><?php echo __('Work with us'); ?></a>
            </li>
        <?php } ?>

        <li>
            <a href="<?php echo DEFAULT_URL; ?>contato" title="<?php echo __('Contact'); ?>"><?php echo __('Contact'); ?></a>
        </li>
    </ul>

</div>