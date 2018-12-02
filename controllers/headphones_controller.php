<?php
    class HeadphonesController {

        public function index() {
            // Guardamos todos los headphones en una variable
            $headphones = Headphone::all();
            require_once('views/headphones/index.php');
        }

        public function show($id) {
            // si no nos pasan el id redirecionamos hacia la pagina de error,
            if (empty($id)) {
                return call('pages', 'error', null);
            }
            // utilizamos el id para obtener el headphone correspondiente
            $headphone = Headphone::find($id);
            require_once('views/headphones/show.php');
        }

        //Retorna la vista insertar headphone
        public function insert($message) {
            //Si el headphone es crea correctament
            if ($message == "success") {
                echo "<div>L'auricular s'ha creat correctament</div>";
            }

            //Si no es pot crear, mostra error
            else if ($message == "error") {
                echo "<div>Error: segur que aixi no es creen els auriculars...</div>";
            }

            require_once 'views/headphones/insert.php';
        }

        //Agafa per POST els valors i els hi assigna a variables, que finalment les hi passa al
        //metode insertar del model Headphone
        public function newHeadphone() {
            $name = $_POST["name"];
            $type = $_POST["type"];
            $date_launch = $_POST["date_launch"];
            $image=!empty($_FILES["image"]["name"])
                ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : "";

            //Si hi ha algun camp nul
            if ($this->hasNulls([$name, $type, $date_launch, $image])) {
                header('Location: '.constant('URL')."headphones/insert/error");
            }

            //Si tots els camps tenen dades fem insert
            else {
                Headphone::insert($name, $type, $date_launch, $image);
            }
        }

        //Retorna la vista update (modificar) d'un auricular
        public function update($id) {
            if (empty($id)) {
                return call('headphones', 'error', "Error: no s'ha seleccionat cap auricular...");
            }

            $headphone = Headphone::find($id);
            require_once 'views/headphones/update.php';
        }

        //Inserta a la base de dades les modificacions d'un post
        public function updateHeadphone() {
            $id = $_POST["id"];
            $name = $_POST["name"];
            $type = $_POST["type"];
            $date_launch = $_POST["date_launch"];
            $image=!empty($_FILES["image"]["name"])
                ? sha1_file($_FILES['image']['tmp_name']) . "-" . basename($_FILES["image"]["name"]) : null;

            //Si hi ha algun camp nul
            if ($this->hasNulls([$id, $name, $type, $date_launch])) {
                header('Location: '.constant('URL')."headphones/insert/error");
            }

            //Si tots els camps tenen dades fem insert
            else {
                Headphone::update($id, $name, $type, $date_launch, $image);
            }
        }

        // Borrat d'un auricular
        public function delete($id) {
            if (empty($id)) {
                return call('headphones', 'error', "Error: aquest auricular no existeix...");
            }

            // Si eliminem correctament un auricular
            if (Headphone::delete($id)) {
                // Retornem l'index amb tots els auriculars
                header('Location: '.constant('URL')."headphones/index");
            }
            else {
                // En cas contrari, error
                return call('headphones', 'error', "Error: l'auricular no s'ha eliminat...");
            }
        }

        //Comprova si algun dels parametres es nul
        private function hasNulls($request) {
            return in_array(null, $request) || in_array("", $request);
        }

        //Retorna la vista error
        public function error($message) {
            if ($message) {echo "<div> $message </div>";}

            require_once 'views/headphones/error.php';
        }
    }
?>
