<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../libs/css/estilos.css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<div class="container">
    <p>Post #<?php echo $post->id; ?></p>
    <p>Títol: <?php echo $post->title; ?></p>
    <p>Autor: <?php echo $post->author; ?></p>
    <p>Contingut: <?php echo $post->content; ?></p>
    <p>Imatge: <img src="<?php echo constant('URL')."uploads/".$post->image; ?>" width="200"></p>
    <p>Data de creació: <?php echo $post->date_create; ?></p>
    <p>Data de modificació: <?php echo $post->date_modification; ?></p>
</div>

