<div>
    <div>
        <a href='<?php echo constant('URL'); ?>posts/insert'>Insertar post</a>
    </div>

    <p><strong>Llista de posts:</strong></p>
    <table>
        <thead>
            <tr>
                <th>Títol</th>
                <th>Autor</th>
                <th>Data de creació</th>
                <th>Data de modificació</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($posts as $post) {?>
                <tr>
                    <td><?php echo $post->title; ?></td>
                    <td><?php echo $post->author; ?></td>
                    <td><?php echo $post->date_create; ?></td>
                    <td><?php echo $post->date_modification; ?></td>
                    <td>
                        <a href='<?php echo constant('URL'); ?>posts/show/<?php echo $post->id; ?>'>Llegir Posts</a>
<!--
                        <a href='<?php echo constant('URL'); ?>posts/update/<?php echo $post->id; ?>'>Update</a>
                        <a href='<?php echo constant('URL'); ?>posts/delete/<?php echo $post->id; ?>'>Delete</a>
-->
                    </td>
                </tr>
            <?php }?>
        </tbody>
    </table>
</div>
