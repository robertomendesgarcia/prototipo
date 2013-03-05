<?php
switch ($this->params["controller"]) {
    case "noticias":
        $opcoes["titulo"] = "Título";
        break;
    default:
        $opcoes["nome"] = "Nome";
        break;
}

$opcoes['categoria'] = 'Categoria';
?>

<div id="filtro">
<?php
echo $this->Form->create("Filtro", array(
    "url" => array(
        "controller" => $this->params["controller"],
        "action" => $this->params["action"]
    )
));
?>
    <fieldset>
    <?php
    echo $this->Form->input('campo', array('label' => false, 'type' => 'select', 'options' => $opcoes));
    ?>
        <?php
        echo $this->Form->input("filtro", array(
            "label" => false
        ));
        ?>
        <div class="botoes">
        <?php //echo $this->Form->submit("Filtrar", array("div" => false));  ?>
            <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_filtrar.png" alt="submit">
        </div>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>