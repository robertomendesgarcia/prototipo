<?php

$texto = null;
switch ($this->params['controller']) {
    case 'noticiacategorias':
        $texto = __('Categories for News');
        break;
}

$url = null;
if ($this->params['action'] <> 'admin_index') {
    $url = array(
        'controller' => $this->params['controller'],
        'action' => 'index',
        'admin' => true
    );
}

echo '<div id="breadcrumbs">';

echo $this->Html->getCrumbs(' > ', array(
    'text' => $texto,
    'url' => $url,
    'escape' => false
));

echo '</div>';
?>     
