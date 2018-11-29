<DOCTYPE html>
  <html>

  <head>
    <title>MVC</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Latest compiled and minified Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" />

    <!-- our custom CSS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="../libs/css/estilos.css">
  </head>

  <body>
    <header>

      <nav class="navbar navbar-expand navbar-dark bg-dark">
        <a class="navbar-brand" href="<?php echo constant('URL'); ?>">MVC</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo constant('URL'); ?>">Inici <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo constant('URL'); ?>posts/index">Posts</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="#">Disabled</a>
            </li>
          </ul>
        </div>
      </nav>

    </header>

    <?php require_once('routes.php'); ?>

   <footer>
        <div style="background-color: #343a40;
                    color: rgba(255,255,255,.75);
                    position: absolute;
                    bottom: 0;
                    width: 100%;
                    height: 30px;
                    line-height: 30px;">
                        by xermi15 - v0.5.2
        </div>
   </footer>

  </body>

  </html>
