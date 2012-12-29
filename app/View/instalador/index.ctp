<div id="tabs">
    <ul>
        <li>
            <a href="#tabs-1">Passo 1</a>
        </li>
        <li>
            <a href="#tabs-2">Passo 2</a>
        </li>
        <li>
            <a href="#tabs-3">Passo 3</a>
        </li>
        <li>
            <a href="#tabs-4">Passo 4</a>
        </li>
    </ul>

    <?php echo $this->Form->create('Estrutura'); ?>

    <div id="tabs-1">

        <h3>Layout</h3>
        <p>Primeiro vamos escolher o <strong>layout</strong>.</p>

        <?php echo $this->Form->hidden('tipo_layout', array('value' => 1)); ?>

        <ul>
            <li>
                <a href="#" title="Menu no topo, rodapé e barra lateral para Banners.">
                    <img src="<?php echo DEFAULT_URL; ?>img/layouts/01.png" alt="Menu no topo, rodapé e barra lateral para Banners." />
                </a>
            </li>
            <li>
                <a href="#" title="Menu no topo, rodapé e barra lateral para Banners.">
                    <img src="<?php echo DEFAULT_URL; ?>img/layouts/02.png" alt="Menu na esquerda, rodapé e barra lateral para Banners." />
                </a>
            </li>
            <li>
                <a href="#" title="Menu no topo, rodapé e barra lateral para Banners.">
                    <img src="<?php echo DEFAULT_URL; ?>img/layouts/03.png" alt="Menu no topo e rodapé." />
                </a>
            </li>
            <li>
                <a href="#" title="Menu no topo, rodapé e barra lateral para Banners.">
                    <img src="<?php echo DEFAULT_URL; ?>img/layouts/04.png" alt="Menu na esquerda e rodapé." />
                </a>
            </li>
        </ul>






    </div>
    <div id="tabs-2">
        <p><strong>Click this tab again to close the content pane.</strong></p>
        <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc.</p>
    </div>
    <div id="tabs-3">
        <p><strong>Click this tab again to close the content pane.</strong></p>
        <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum.</p>
    </div>
    <div id="tabs-4">
        <p><strong>Click this tab again to close the content pane.</strong></p>
        <p>Duis cursus. Maecenas ligula eros, blandit nec, pharetra at, semper at, magna. Nullam ac lacus. Nulla facilisi. Praesent viverra justo vitae neque. Praesent blandit adipiscing velit. Suspendisse potenti. Donec mattis, pede vel pharetra blandit, magna ligula faucibus eros, id euismod lacus dolor eget odio. Nam scelerisque. Donec non libero sed nulla mattis commodo. Ut sagittis. Donec nisi lectus, feugiat porttitor, tempor ac, tempor vitae, pede. Aenean vehicula velit eu tellus interdum rutrum. Maecenas commodo. Pellentesque nec elit. Fusce in lacus. Vivamus a libero vitae lectus hendrerit hendrerit.</p>
    </div>
</div>