<DOCTYPE html>
    <html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo $page_title; ?></title>

        <!-- Latest compiled and minified Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />

        <!-- our custom CSS -->
        <link rel="stylesheet" href="libs/css/custom.css" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Black+Han+Sans" rel="stylesheet">
    </head>

    <body>
        <header>
            <a href='<?php echo constant('URL'); ?>'>Inici</a>
            <a href='<?php echo constant('URL'); ?>posts/index'>Posts</a>
        </header>

        <?php require_once('routes.php'); ?>

        <footer>
            by xermi15     v0.4.3
        </footer>
    </body>

</html>
