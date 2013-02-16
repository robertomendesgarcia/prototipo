<div class="noticias view">
      <h2><?php echo __('Noticia'); ?></h2>
      <dl>
            <dt><?php echo __('Id'); ?></dt>
            <dd>
                  <?php echo h($noticia['Noticia']['id']); ?>
                  &nbsp;
            </dd>
            <dt><?php echo __('Titulo'); ?></dt>
            <dd>
                  <?php echo h($noticia['Noticia']['titulo']); ?>
                  &nbsp;
            </dd>
            <dt><?php echo __('Texto'); ?></dt>
            <dd>
                  <?php echo h($noticia['Noticia']['texto']); ?>
                  &nbsp;
            </dd>
            <dt><?php echo __('Fonte'); ?></dt>
            <dd>
                  <?php echo h($noticia['Noticia']['fonte']); ?>
                  &nbsp;
            </dd>
            <dt><?php echo __('Data'); ?></dt>
            <dd>
                  <?php echo h($noticia['Noticia']['data']); ?>
                  &nbsp;
            </dd>
            <dt><?php echo __('Ativo'); ?></dt>
            <dd>
                  <?php echo h($noticia['Noticia']['ativo']); ?>
                  &nbsp;
            </dd>
            <dt><?php echo __('Noticia Categoria'); ?></dt>
            <dd>
                  <?php echo $this->Html->link($noticia['NoticiaCategoria']['nome'], array('controller' => 'noticia_categorias', 'action' => 'view', $noticia['NoticiaCategoria']['id'])); ?>
                  &nbsp;
            </dd>
            <dt><?php echo __('Created'); ?></dt>
            <dd>
                  <?php echo h($noticia['Noticia']['created']); ?>
                  &nbsp;
            </dd>
            <dt><?php echo __('Modified'); ?></dt>
            <dd>
                  <?php echo h($noticia['Noticia']['modified']); ?>
                  &nbsp;
            </dd>
      </dl>
</div>
<div class="related">
      <h3><?php echo __('Comments'); ?></h3>
      <?php if (!empty($noticia['NoticiaComentario'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                  <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('Comentario'); ?></th>
                        <th><?php echo __('Autor'); ?></th>
                        <th><?php echo __('Created'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                  </tr>
                  <?php
                  $i = 0;
                  foreach ($noticia['NoticiaComentario'] as $noticiaComentario):
                        ?>
                        <tr>
                              <td><?php echo $noticiaComentario['id']; ?></td>
                              <td><?php echo $noticiaComentario['comentario']; ?></td>
                              <td><?php echo $noticiaComentario['autor']; ?></td>
                              <td><?php echo $noticiaComentario['created']; ?></td>
                        </tr>
            <?php endforeach; ?>
            </table>
<?php endif; ?>
</div>
<div class="related">
      <h3><?php echo __('Images'); ?></h3>
<?php if (!empty($noticia['NoticiaImagen'])): ?>
            <table cellpadding = "0" cellspacing = "0">
                  <tr>
                        <th><?php echo __('Id'); ?></th>
                        <th><?php echo __('Titulo'); ?></th>
                        <th><?php echo __('Destaque'); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                  </tr>
                  <?php
                  $i = 0;
                  foreach ($noticia['NoticiaImagen'] as $noticiaImagen):
                        ?>
                        <tr>
                              <td><?php echo $noticiaImagen['id']; ?></td>
                              <td><?php echo $noticiaImagen['titulo']; ?></td>
                              <td><?php echo $noticiaImagen['destaque']; ?></td>
                        </tr>
            <?php endforeach; ?>
            </table>
<?php endif; ?>

</div>
