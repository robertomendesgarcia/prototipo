<h3>Categorias para os Produtos</h3>

<table>
    <thead>
        <tr>
            <th>Categoria</th>
            <th>A&ccedil;&otilde;es</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categorias as $key => $value) { ?>
            <tr>
                <td><?php echo $value; ?></td>
                <td><?php echo $this->element('botoes_de_acao', array('id' => $key, 'label' => $value, 'botoes' => '{update} {delete}')); ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>