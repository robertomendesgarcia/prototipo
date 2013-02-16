<div class="produtos view">
      <dl>
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                  <?php echo h($produto['Produto']['id']); ?>
            </dd>
            <dt><?php echo __('Nome'); ?></dt>
            <dd>
                  <?php echo h($produto['Produto']['nome']); ?>
            </dd>
            <dt><?php echo __('Texto'); ?></dt>
            <dd>
                  <?php echo h($produto['Produto']['valor']); ?>
            </dd>
            <dt><?php echo __('Fonte'); ?></dt>
            <dd>
                  <?php echo h($produto['Produto']['descricao']); ?>
            </dd>

            <dt><?php echo __('Ativo'); ?></dt>
            <dd>
                  <?php echo h($produto['Produto']['ativo']); ?>
            </dd>
            <dt><?php echo __('Noticia Categoria'); ?></dt>
            <dd>
                  <?php echo h($produto['ProdutoCategoria']['nome']); ?>
            </dd>
      </dl>
</div>