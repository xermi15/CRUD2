<div>
    <h2>Modificar Post</h2>
    <form action="<?php echo constant('URL'); ?>posts/updatePost" method="post" enctype="multipart/form-data">
        <table>
            <input type="hidden" name="id" value="<?php echo $post->id; ?>" readonly>
            <tr>
                <td>
                    <b>Titol:</b>
                </td>
                <td>
                    <input type="text" name="title" placeholder="Introdueix el titol" value="<?php echo $post->title; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <b>Autor:</b>
                </td>
                <td>
                    <input type="text" name="author" placeholder="Introdueix l'autor" value="<?php echo $post->author; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <b>Contingut:</b>
                </td>
                <td>
                    <input type="text" name="content" placeholder="Introdueix el contingut del post" value="<?php echo $post->content; ?>">
                </td>
            </tr>
            <tr>
                <td>
                    <b>Imatge:</b>
                </td>
                <td>
                    <img src='<?php echo constant('URL')."uploads/".$post->image; ?>' style='width:300px;' />
                    <input type="file" name="image" />
                </td>
            </tr>
        </table>

        <input type="submit" value="Update">
    </form>
</div>
