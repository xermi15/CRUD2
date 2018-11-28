<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../libs/css/estilos.css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<div class="container">
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

    <form>
        <div class="form-group row">
            <label for="exampleInputEmail1">Post #<?php echo $post->id; ?></label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>

        <div class="form-group row">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            <input type="text" name="content" placeholder="Introdueix el contingut del post" value="<?php echo $post->content; ?>">
        </div>

        <div class="form-group row">
            <label for="exampleInputPassword1">Contingut</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            <input type="text" name="content" placeholder="Introdueix el contingut del post" value="<?php echo $post->content; ?>">
        </div>

        <div class="form-group row">
            <label for="exampleFormControlFile1">Imatge</label>
            <img src='<?php echo constant('URL')."uploads/".$post->image; ?>' style='width:200px;'/>
            <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
        </div>


    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
