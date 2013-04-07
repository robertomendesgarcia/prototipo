<?php

$texto = null;
switch ($this->params['controller']) {
    case 'noticiacategorias':
        $texto = __('Categories for News');
        break;
    case 'produtocategorias':
        $texto = __('Categories for Products');
        break;
    case 'noticias':
        $texto = __('News');
        break;
    case 'bannertipos':
        $texto = __('Banner Types');
        break;
    case 'paginas':
        $texto = __('Pages Editable');
        break;
    case 'banners':
        $texto = __('Banners');
        break;
    case 'usuarios':
        $texto = __('Users');
        break;
    case 'produtos':
        $texto = __('Products');
        break;
    case 'newsletters':
        $texto = __('Newsletter');
        break;
    case 'curriculos':
        $texto = __('Resumes');
        break;
    case 'configuracoes':
        $texto = explode(' - ', $title_for_layout);
        $texto = $texto[0];
        //$this->Html->addCrumb($titulo[0]);
        break;
}

$url = null;
if (($this->params['action'] <> 'admin_index') && ($this->params['controller'] <> 'configuracoes')) {
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
