<?php
    function call($controller, $action, $parameters) {
        require_once('controllers/' . $controller . '_controller.php');
        switch($controller) {
            case 'pages':
                $controller = new PagesController();
                break;
            case 'posts':

                // necesitamos el modelo para después consultar a la BBDD desde el controlador
                require_once('models/post.php');
                $controller = new PostsController();
                break;
        }
        $controller->{ $action }($parameters);
    }

    // agregando una entrada para el nuevo controlador y sus acciones.
    $controllers = array( 'pages' => ['home', 'error'],
                          'posts' => ['index', 'show', 'insert', 'newPost', 'error' ]);
    if (array_key_exists($controller, $controllers)) {
        if (in_array($action, $controllers[$controller])) {
                call($controller, $action, $parameters);
        } else {
                call('pages', 'error', null);
        }
    } else {
        call('pages', 'error', null);
    }
?>
