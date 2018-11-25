<?php
    class PostsController {

        public function index() {
            // Guardamos todos los posts en una variable
            $posts = Post::all();
            require_once('views/posts/index.php');
        }

        public function show($id) {
            // esperamos una url del tipo ?controller=posts&action=show&id=x
            // si no nos pasan el id redirecionamos hacia la pagina de error,
            // el id tenemos que buscarlo en la BBDD
            if (empty($id)) {
                return call('pages', 'error', null);
            }
            // utilizamos el id para obtener el post correspondiente
            $post = Post::find($id);
            require_once('views/posts/show.php');
        }

        public function insert($message) {
            //Si el post es crea correctament
            if ($message == "success") {
                echo "<div class="success">El post s'ha creat correctament</div>";
            }

            //Si no es pot crear, mostra error
            else if ($message == "error") {
                echo "<div class="error">Error: segur que aixi no es creen els posts...</div>";
            }

            require_once 'views/posts/insert.php';
        }

        public function newPost() {
            $title = $_POST["title"];
            $author = $_POST["author"];
            $content = $_POST["content"];
            $image=!empty($_FILES["image"]["name"])
                ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";
            $date_create = date('Y-m-d H:i:s');
            $date_modification = date('Y-m-d H:i:s');

            //Si hi ha algun camp nul
            if ($this->hasNulls([$title, $author, $content, $image, $date_create, $date_modification])) {
                header('Location: '.constant('URL')."posts/insert/error");
            }

            //Si tots els camps tenen dades fem insert
            else {
                Post::insert($title, $author, $content, $image, $date_create, $date_modification);
            }
        }

        //Comprova si algun dels parametres es nul
        private function hasNulls($request) {
            return in_array(null, $request) || in_array("", $request);
        }

        //Retorna la vista error
        public function error($message) {
            if ($message) {
                echo "<div> $message </div>";
            }

            require_once 'views/posts/error.php';
        }
    }
?>
