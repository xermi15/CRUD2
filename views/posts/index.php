<div class="container">
    <h1>Llistat de posts:</h1>
    <table>
        <tr>
            <th>Títol</th>
            <th>Autor</th>
            <th>Data de creació</th>
            <th>Data de modificació</th>
            <th>Opcions</th>
        </tr>
        <?php foreach ($posts as $post) {?>
            <tr>
                <td><?php echo $post->title; ?></td>
                <td><?php echo $post->author; ?></td>
                <td><?php echo $post->date_create; ?></td>
                <td><?php echo $post->date_modification; ?></td>
                <td>
                    <a href='<?php echo constant('URL'); ?>posts/show/<?php echo $post->id; ?>' class="btn btn-secondary" role="button">Llegir</a>
                    <a href='<?php echo constant('URL'); ?>posts/update/<?php echo $post->id; ?>' class="btn btn-warning" role="button">Modificar</a>
                    <a href='<?php echo constant('URL'); ?>posts/delete/<?php echo $post->id; ?>' class="btn btn-danger" role="button">Eliminar</a>
                </td>
            </tr>
        <?php }?>
    </table>
</div>

<div class="container">
    <a href='<?php echo constant('URL');?>posts/insert' class="btn btn-dark" role="button">Insertar nou post</a>
</div>
