
<?php if (isset($id) && isset($label) && isset($botoes)) { ?>
<?php $label = str_replace('&nbsp;', '', $label); ?>

    <?php if (strpos($botoes, 'update')) { ?>
        <a class="botao update" href="<?php echo DEFAULT_URL . $this->params['controller'] . '/edit/' . $id . '/' . $this->Uteis->slug($label); ?>">
            <?php echo __("Editar"); ?>
        </a>
    <?php } ?>

    <?php if (strpos($botoes, 'delete')) { ?>
        <a class="botao delete" href="<?php echo DEFAULT_URL . $this->params['controller'] . '/delete/' . $id . '/' . $this->Uteis->slug($label); ?>">
            <?php echo __("Excluir"); ?>
        </a>
    <?php } ?>

<?php } ?>