
<div id="menu" class="janela">

    <ul>
        <li>
            <?php echo $this->Html->link(__('Welcome'), array('controller' => 'usuarios', 'action' => 'bem_vindo', 'admin' => true), array('title' => __('Welcome'))); ?>
        </li>
        <li>
            <?php echo $this->Html->link(__('Logout'), array('controller' => 'usuarios', 'action' => 'logout', 'admin' => false), array('class' => 'logout', 'title' => __('Logout'))); ?>
        </li>
        <li>
            <?php echo $this->Html->link(__('Change Password'), array('controller' => 'usuarios', 'action' => 'alterar_senha', 'admin' => true), array('title' => __('Change Password'))); ?>
        </li>
        <li>
            <h3><?php echo __('Content'); ?></h3>
            <ul>
                <?php if ($config['usa_noticias']) { ?>
                    <li>
                       <?php echo $this->Html->link(__('Categorias das Notícias'), array('controller' => 'noticiacategorias', 'action' => 'index', 'admin' => true), array('title' => __('Categorias das Notícias'))); ?>            
                    </li>
                    <li>
                        <?php echo $this->Html->link(__('News'), array('controller' => 'noticias', 'action' => 'index', 'admin' => true), array('title' => __('News'))); ?>
                    </li>
                <?php } ?>
                <?php if ($config['usa_produtos']) { ?>
                    <li>
                        <?php echo $this->Html->link(__('Categorias dos Produtos'), array('controller' => 'produtocategorias', 'action' => 'index', 'admin' => true), array('title' => __('Categorias dos Produtos'))); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__('Products'), array('controller' => 'produtos', 'action' => 'index', 'admin' => true), array('title' => __('Products'))); ?>
                    </li>
                <?php } ?>
                <li>
                    <?php echo $this->Html->link(__('Newsletter'), array('controller' => 'newsletters', 'action' => 'index', 'admin' => true), array('title' => __('Newsletter'))); ?>
                </li>
                <li>
                    <?php echo $this->Html->link(__('Resumes'), array('controller' => 'curriculos', 'action' => 'index', 'admin' => true), array('title' => __('Resumes'))); ?>
                </li>
                <?php if ($config['usa_banners']) { ?>
                    <li>
                        <?php echo $this->Html->link(__('Banners'), array('controller' => 'banners', 'action' => 'index', 'admin' => true), array('title' => __('Banners'))); ?>
                    </li>
                    <li style="display: none;">
                        <?php echo $this->Html->link(__('-- Tipo de Banner'), array('controller' => 'bannertipos', 'action' => 'index', 'admin' => true), array('title' => __('-- Tipo de Banner'))); ?>
                    </li>
                <?php } ?>
                <li>
                    <?php echo $this->Html->link(__('Páginas'), array('controller' => 'paginas', 'action' => 'index', 'admin' => true), array('title' => __('Páginas'))); ?>
                </li>
            </ul>
        </li>  

        <?php
        $tipo_usuario = $this->Session->read('Auth.User.UsuarioTipo.id');
        if ($tipo_usuario == 1) {
            ?>

            <li>
                <h3><?php echo __('Settings'); ?></h3>
                <ul>
                    <li>
                        <?php echo $this->Html->link(__('Dados Iniciais'), array('controller' => 'configuracoes', 'action' => 'config', 'admin' => true, 'dados'), array('title' => __('Dados Iniciais'))); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__('E-mail'), array('controller' => 'configuracoes', 'action' => 'email', 'admin' => true), array('title' => __('E-mail'))); ?>
                    </li>
                    <li style="display: none;">
                        <?php echo $this->Html->link(__('--Geral'), array('controller' => 'configuracoes', 'action' => 'config', 'admin' => true, 'geral'), array('title' => __('--Geral'))); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__('Layout'), array('controller' => 'configuracoes', 'action' => 'config', 'admin' => true, 'layout'), array('title' => __('Layout'))); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__('Menu'), array('controller' => 'configuracoes', 'action' => 'config', 'admin' => true, 'menu'), array('title' => __('Menu'))); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__('News'), array('controller' => 'configuracoes', 'action' => 'config', 'admin' => true, 'noticias'), array('title' => __('News'))); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__('Products'), array('controller' => 'configuracoes', 'action' => 'config', 'admin' => true, 'produtos'), array('title' => __('Products'))); ?>
                    </li>
                    <li>
                        <?php echo $this->Html->link(__('Users'), array('controller' => 'usuarios', 'action' => 'index', 'admin' => true), array('title' => __('Users'))); ?>
                    </li>
                </ul>
            </li>

        <?php } ?>

    </ul>

</div>