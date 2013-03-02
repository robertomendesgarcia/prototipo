<?php
$opcoes = array(
    "codigo" => "Título",
);

//switch ($this->params["controller"]) {
//    case "veiculos":
//        $opcoes["placa"] = "Placa<br/>";
//        break;
//    case "usuarios":
//        $opcoes["usuario"] = "Usuário<br/>";
//        break;
//    default:
//        $opcoes["nome"] = "Nome<br/>";
//        break;
//}

if ($this->params["controller"] == "lancamentos") {
    unset($opcoes["nome"]);
}
?>

<div id="filtro">
    <?php
    echo $this->Form->create("Filtro", array(
        "url" => array(
            "controller" => $this->params["controller"],
            "action" => ($this->params["controller"] == "usuarios") ? "auth_lista" : $this->params["action"]
        )
    ));
    ?>
    <fieldset>
        <?php
        echo $this->Form->input('ativo', array('label' => false, 'type' => 'select', 'options' => $opcoes));
        ?>
        <?php
        echo $this->Form->input("filtro", array(
            "label" => false
        ));
        ?>
        <div class="botoes">
            <?php //echo $this->Form->submit("Filtrar", array("div" => false)); ?>
            <input type="image" src="<?php echo $this->webroot; ?>img/admin/layout/bt_filtrar.png" alt="submit">
        </div>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>