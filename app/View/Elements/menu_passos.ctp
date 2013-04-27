<?php
$passos = array();
$rota = null;

if ($this->params['controller'] == 'instalador') {
    $passos[1] = 'configuraBanco';
    $passos[2] = 'configuraEmail';
    $passos[3] = 'criarUsuarioAdmin';
} else {
    $rota = 'admin/';
    $passos[1] = 'configuraLayout';
    $passos[2] = 'configuraRecursos';
    $passos[3] = 'configuraDados';
} 
//die($this->params['action'] .'--'. $passos[2]);
?>


<ul id="menu_passos">

    <li class="passo_1">
        <a class="<?php echo (in_array(str_replace('admin_', '',$this->params['action']), array($passos[1], 'index', 'admin_index'))) ? 'selecionado' : null; ?>" href="<?php echo DEFAULT_URL . $rota . $this->params['controller'] . '/' . $passos[1] . '/passo-1'; ?>" title="<?php echo __('Passo 1'); ?>">
            <?php echo __('Passo 1'); ?>
        </a>
    </li>

    <li class="passo_2">
        <a class="<?php echo (str_replace('admin_', '', $this->params['action']) == $passos[2]) ? 'selecionado' : null; ?>" href="<?php echo DEFAULT_URL . $rota . $this->params['controller'] . '/' . $passos[2] . '/passo-2'; ?>" title="<?php echo __('Passo 2'); ?>">
            <?php echo __('Passo 2'); ?>
        </a>
    </li>

    <li class="passo_3">
        <a class="<?php echo (str_replace('admin_', '', $this->params['action']) == $passos[3]) ? 'selecionado' : null; ?>" href="<?php echo DEFAULT_URL . $rota . $this->params['controller'] . '/' . $passos[3] . '/passo-3'; ?>" title="<?php echo __('Passo 3'); ?>">
            <?php echo __('Passo 3'); ?>
        </a>
    </li>

</ul>