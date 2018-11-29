<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="../../libs/css/estilos.css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">


<div class="container">

    <div class="row">

        <!-- Post Content Column -->
        <div class="col-lg-8">

            <!-- Titol -->
            <h1 class="mt-4">
                <?php echo $post->title; ?>
            </h1>

            <!-- Autor -->
            <p class="lead">
                by
                <a href="#">
                    <?php echo $post->author; ?></a>
            </p>

            <hr>

            <!-- Data creacio post -->
            <p>Creat el dia
                <?php echo $post->date_create; ?>
            </p>

            <hr>

            <!-- Preview Imatge -->
            <img style="max-height: 300px" class="img-fluid rounded maxHeight" src="<?php echo constant('URL')."uploads/".$post->image; ?>">


            <hr>

            <!-- Contingut Post -->
            <p style="text-align: justify">Contingut:
                <?php echo $post->content; ?>
            </p>

            <hr>

            <!-- Data modificacio post -->
            <p>Modificat el dia
                <?php echo $post->date_create; ?>
            </p>

            <hr>

        </div>
    </div>
</div>
