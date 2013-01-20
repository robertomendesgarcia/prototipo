<?php
$opcoes = array(
    "codigo" => "Código<br/>",
);

switch ($this->params["controller"]) {
    case "veiculos":
        $opcoes["placa"] = "Placa<br/>";
        break;
    case "usuarios":
        $opcoes["usuario"] = "Usuário<br/>";
        break;
    default:
        $opcoes["nome"] = "Nome<br/>";
        break;
}

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
        if ($this->params["controller"] == "lancamentos") {
            echo "<div style='display: block'>";
            echo $this->Form->checkbox("exibir_finalizados");
            echo "<label style='vertical-align: top;' for='FiltroExibirFinalizados'>&nbsp;Exibir finalizados.</label>";
            echo "</div>";
        }
        ?>
        <div class="radio">
            <?php
            echo $this->Form->radio("tipo", $opcoes, array(
                "fieldset" => false,
                "legend" => false
                    )
            );
            ?>
        </div>
        <?php
        echo $this->Form->input("filtro", array(
            "label" => "Filtrar por:"
        ));
        ?>
        <div class="botoes">
<?php echo $this->Form->submit("Filtrar", array("div" => false)); ?>
        </div>
    </fieldset>
<?php echo $this->Form->end(); ?>
</div>