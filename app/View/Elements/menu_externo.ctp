
<div id="menu" class="<?php echo ($tipo == 1) ? 'topo' : 'esquerda'; ?>">
    <ul>

        <?php if ($config['pagina_institucional']) { ?>
            <li>
                <a href="<?php echo DEFAULT_URL; ?>a-empresa" title="<?php echo __('Company'); ?>"><?php echo __('Company'); ?></a>
            </li>
        <?php } ?>   

        <?php if ($config['produtos']) { ?>
            <li>
                <a href="<?php echo DEFAULT_URL; ?>produtos" title="<?php echo __('Products'); ?>"><?php echo __('Products'); ?></a>
            </li>
        <?php } ?>   

        <?php if ($config['noticias']) { ?>
            <li>
                <a href="<?php echo DEFAULT_URL; ?>noticias" title="<?php echo __('News'); ?>"><?php echo __('News'); ?></a>
            </li>
        <?php } ?>          

        <?php if ($config['trabalhe_conosco']) { ?>
            <li>
                <a href="<?php echo DEFAULT_URL; ?>trabalhe-conosco" title="<?php echo __('Work with us'); ?>"><?php echo __('Work with us'); ?></a>
            </li>
        <?php } ?>

        <li>
            <a href="<?php echo DEFAULT_URL; ?>contato" title="<?php echo __('Contact'); ?>"><?php echo __('Contact'); ?></a>
        </li>
    </ul>

</div>