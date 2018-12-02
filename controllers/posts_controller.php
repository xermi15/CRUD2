<?php
    class PostsController {

        public function index() {
            // Guardamos todos los posts en una variable
            $posts = Post::all();
            require_once('views/posts/index.php');
        }

        public function show($id) {
            // si no nos pasan el id redirecionamos hacia la pagina de error,
            if (empty($id)) {
                return call('pages', 'error', null);
            }
            // utilizamos el id para obtener el post correspondiente
            $post = Post::find($id);
            require_once('views/posts/show.php');
        }

        //Retorna la vista insertar post
        public function insert($message) {
            //Si el post es crea correctament
            if ($message == "success") {
                echo "<div>El post s'ha creat correctament</div>";
            }

            //Si no es pot crear, mostra error
            else if ($message == "error") {
                echo "<div>Error: segur que aixi no es creen els posts...</div>";
            }

            require_once 'views/posts/insert.php';
        }

        //Agafa per POST els valors i els hi assigna a variables, que finalment les hi passa al
        //metode insertar del model Post
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

        //Retorna la vista update (modificar) d'un post
        public function update($id) {
            if (empty($id)) {
                return call('posts', 'error', "Error: no s'ha seleccionat cap post...");
            }

            $post = Post::find($id);
            require_once 'views/posts/update.php';
        }

        //Inserta a la base de dades les modificacions d'un post
        public function updatePost() {

            $id = $_POST["id"];
            $title = $_POST["title"];
            $author = $_POST["author"];
            $content = $_POST["content"];
            $image=!empty($_FILES["image"]["name"])
                ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : null;
            $date_modification = date('Y-m-d H:i:s');

            if ($this->hasNulls([$id, $title, $author, $content, $date_modification])) {
                // Si hi ha algun camp que es nul
                return call('posts', 'error', "Error: s'han d'especificar tots els camps...");
            }
            else {
                // Si tots elscamps tenen dades fem update
                Post::update($id, $title, $author, $content, $image, $date_modification);
            }
        }

        // Borrat d'un post
        public function delete($id) {
            if (empty($id)) {
                return call('posts', 'error', "Error: aquest post no existeix...");
            }

            // Si eliminem correctament un post
            if (Post::delete($id)) {
                // Retornem l'index amb tots els posts
                header('Location: '.constant('URL')."posts/index");
            }
            else {
                // En cas contrari, error
                return call('posts', 'error', "Error: el post no s'ha eliminat...");
            }
        }

        //Comprova si algun dels parametres es nul
        private function hasNulls($request) {
            return in_array(null, $request) || in_array("", $request);
        }

        //Retorna la vista error
        public function error($message) {
            if ($message) {echo "<div> $message </div>";}

            require_once 'views/posts/error.php';
        }
    }
?>
