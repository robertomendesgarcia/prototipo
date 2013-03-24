<?php
$passos = array();

if ($this->params['controller'] == 'instalador') {
    $passos[1] = 'configuraBanco';
    $passos[2] = 'configuraEmail';
    $passos[3] = 'criarUsuarioAdmin';
} else {
    $passos[1] = 'configuraLayout';
    $passos[2] = 'configuraRecursos';
    $passos[3] = 'configuraDados';
}
?>


<ul id="menu_passos">

    <li class="passo_1">
        <a href="<?php echo DEFAULT_URL . $this->params['controller'] . '/' . $passos[1] . '/passo-1'; ?>" title="<?php echo __('Passo 1'); ?>">
            <?php echo __('Passo 1'); ?>
        </a>
    </li>

    <li class="passo_2">
        <a href="<?php echo DEFAULT_URL . $this->params['controller'] . '/' . $passos[2] . '/passo-2'; ?>" title="<?php echo __('Passo 2'); ?>">
            <?php echo __('Passo 2'); ?>
        </a>
    </li>

    <li class="passo_3">
        <a href="<?php echo DEFAULT_URL . $this->params['controller'] . '/' . $passos[3] . '/passo-3'; ?>" title="<?php echo __('Passo 3'); ?>">
            <?php echo __('Passo 3'); ?>
        </a>
    </li>

</ul>