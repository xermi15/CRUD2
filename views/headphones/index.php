<div class="container">
    <h1>Llistat d'auriculars:</h1>
    <table>
        <tr>
            <th>Nom</th>
            <th>Tipus</th>
            <th>Data de llançament</th>
            <th>Opcions</th>
        </tr>
        <?php foreach ($headphones as $headphone) {?>
            <tr>
                <td><?php echo $headphone->name; ?></td>
                <td><?php echo $headphone->type; ?></td>
                <td><?php echo $headphone->date_launch; ?></td>
                <td>
                    <a href='<?php echo constant('URL'); ?>headphones/show/<?php echo $headphone->id; ?>' class="btn btn-secondary" role="button">Llegir</a>
                    <a href='<?php echo constant('URL'); ?>headphones/update/<?php echo $headphone->id; ?>' class="btn btn-warning" role="button">Modificar</a>
                    <a href='<?php echo constant('URL'); ?>headphones/delete/<?php echo $headphone->id; ?>' class="btn btn-danger" role="button">Eliminar</a>
                </td>
            </tr>
        <?php }?>
    </table>
</div>

<div class="container">
    <a href='<?php echo constant('URL');?>headphones/insert' class="btn btn-dark" role="button">Insertar nous auriculars</a>
</div>
<hr>
