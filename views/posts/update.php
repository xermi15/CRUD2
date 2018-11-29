<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../libs/css/estilos.css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<div class="container">
    <h1>Modificar Post <?php echo $post->id; ?></h1>
    <form action="<?php echo constant('URL'); ?>posts/updatePost" method="post" enctype="multipart/form-data" id="updateForm">
        <input type="hidden" name="id" value="<?php echo $post->id; ?>" readonly>
        <div class="form-group">
            <label for="exampleInput">Titol:</label>
            <input type="text" class="form-control" name="title" value="<?php echo $post->title;?>">
        </div>

        <div class="form-group">
            <label for="exampleInput">Autor:</label>
            <input type="text" class="form-control" name="author" value="<?php echo $post->author;?>">
        </div>

        <div class="form-group">
            <label for="exampleInput">Contingut:</label>
            <textarea name="content" class="form-control" form="updateForm" rows="10" value="<?php echo $post->content; ?>"><?php echo $post->content; ?></textarea>
        </div>

        <div class="form-group">
            <label for="exampleFormControlFile1">Imatge:</label>
            <div class="col-auto">
                <img src='<?php echo constant('URL')."uploads/".$post->image; ?>' style='width:auto;'/>
            </div>
            <div class="col-auto">
                <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
            </div>

        </div>
    <button type="submit" value="Update" class="btn btn-dark">Modificar</button>
</form>
</div>
