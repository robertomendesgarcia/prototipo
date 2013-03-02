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
    <fieldset  class="janela">
        <legend>Filtro</legend>
        <?php
        echo $this->Form->input('ativo', array('label' => __('Filtrar por:'), 'type' => 'select', 'options' => $opcoes));
        ?>
        <?php
        echo $this->Form->input("filtro", array(
            "label" => "Que contenha:"
        ));
        ?>
        <div class="botoes">
<?php echo $this->Form->submit("Filtrar", array("div" => false)); ?>
        </div>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>