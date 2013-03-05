
<div id="menu" class="janela">

    <ul>
        <li>
            <?php echo $this->Html->link(__('Welcome'), array('controller' => 'usuarios', 'action' => 'bem_vindo', 'admin' => true)); ?>
        </li>
        <li>
            <?php echo $this->Html->link(__('Logout'), array('controller' => 'usuarios', 'action' => 'logout', 'admin' => true)); ?>
        </li>
        <li>
            <h3><?php echo __('Content'); ?></h3>
            <ul>
                <li>
                    <?php echo $this->Html->link(__('News'), array('controller' => 'noticias', 'action' => 'index', 'admin' => true)); ?>
                </li>
                <li>
                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Html->link(__('Categories'), array('controller' => 'noticiacategorias', 'action' => 'index', 'admin' => true)); ?>            
                </li>
                <li>
                    <?php echo $this->Html->link(__('Products'), array('controller' => 'produtos', 'action' => 'index', 'admin' => true)); ?>
                </li>
                <li>
                    &nbsp;&nbsp;&nbsp;&nbsp;<?php echo $this->Html->link(__('Categories'), array('controller' => 'produtocategorias', 'action' => 'index', 'admin' => true)); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Newsletter'), array('controller' => 'newsletters', 'action' => 'index', 'admin' => true)); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Resumes'), array('controller' => 'curriculos', 'action' => 'index', 'admin' => true)); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Banners'), array('controller' => 'banners', 'action' => 'index', 'admin' => true)); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('-- Tipo de Banner'), array('controller' => 'bannertipos', 'action' => 'index', 'admin' => true)); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Páginas'), array('controller' => 'paginas', 'action' => 'index', 'admin' => true)); ?>
                </li>
            </ul>
        </li>  
        <li>
            <h3><?php echo __('Settings'); ?></h3>
            <ul>
                <li>
                    <?php echo $this->Html->link(__('Layout'), array('controller' => 'configuracoes', 'action' => 'config', 'admin' => true, 'layout')); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Menu'), array('controller' => 'configuracoes', 'action' => 'config', 'admin' => true, 'menu')); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('News'), array('controller' => 'configuracoes', 'action' => 'config', 'admin' => true, 'noticias')); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Products'), array('controller' => 'configuracoes', 'action' => 'config', 'admin' => true, 'produtos')); ?>
                </li>
            </ul>
        </li>
    </ul>

</div>