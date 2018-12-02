<?php
class Headphone {

    // definimos tres atributos
    // los declaramos como públicos para acceder directamente $post->author
    public $id;
    public $name;
    public $type;
    public $date_launch;
    public $image;

    public function __construct($id, $name, $type, $date_launch, $image) {
        $this->id = $id;
        $this->name = $name;
        $this->type = $type;
        $this->date_launch = $date_launch;
        $this->image = $image;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM headphones');

        // creamos una lista de objectos post y recorremos la respuesta de la consulta
        foreach($req->fetchAll() as $headphone) {
            $list[] = new Headphone($headphone['id'], $headphone['name'], $headphone['type'],$headphone['date_launch'], $headphone['image']);
        }
        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();

        // nos aseguramos que $id es un entero
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM headphones WHERE id = :id');

        // preparamos la sentencia y reemplazamos :id con el valor de $id
        $req->execute(array('id' => $id));
        $headphone = $req->fetch();

        return new Headphone($headphone['id'], $headphone['name'], $headphone['type'],$headphone['date_launch'], $headphone['image']);
    }

    public static function insert($name, $type, $date_launch, $image) {
        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO headphones SET name = :name, type = :type, date_launch = :date_launch, image = :image');
        $data = array(
            ":name" => htmlspecialchars(strip_tags($name)),
            ":type" => htmlspecialchars(strip_tags($type)),
            ":date_launch" => htmlspecialchars(strip_tags($date_launch)),
            ":image" => htmlspecialchars(strip_tags($image))
        );

        if ($req->execute($data)){
            // Inserció correcta
            Headphone::uploadImage($image);
            header('Location: '.constant('URL')."headphones/insert/success");
        } else {
            // Error a l'insertar
            header('Location: '.constant('URL')."headphones/insert/error");
        }
    }

    public static function update($id, $name, $type, $date_launch, $image) {
        $db = Db::getInstance();

        //En el cas de que no canviem la imatge del auricular
        if (empty($image)) {
            $req = $db->prepare('UPDATE headphones SET name = :name, type = :type, date_launch = :date_launch, image = :image WHERE id = :id');
            $data = array(
                ":id" => htmlspecialchars(strip_tags($id)),
                ":name" => htmlspecialchars(strip_tags($name)),
                ":type" => htmlspecialchars(strip_tags($type)),
                ":date_launch" => htmlspecialchars(strip_tags($date_launch))
            );

            if($req->execute($data)){
                // Actualització correcte
                header('Location: '.constant('URL')."headphones/index");
            }else{
                // Error en actualitzzar
                return call('headphones', 'error', "Error: no s'ha pogut actualitzar l'auricular...");
            }
        }
        else {
            $req = $db->prepare('UPDATE headphones SET name = :name, type = :type, date_launch = :date_launch, image = :image WHERE id = :id');
            $data = array(
                ":id" => htmlspecialchars(strip_tags($id)),
                ":name" => htmlspecialchars(strip_tags($name)),
                ":type" => htmlspecialchars(strip_tags($type)),
                ":date_launch" => htmlspecialchars(strip_tags($date_launch))
            );

            if($req->execute($data)){
                // Actualització correcte
                Headphone::uploadImage($image);
                header('Location: '.constant('URL')."headphones/index");
            }else{
                // Error en actualitzzar
                return call('headphones', 'error', "Error: no s'ha pogut actualitzar l'auricular..");
            }
        }
    }

    public static function delete($id) {
        $db = Db::getInstance();
        $req = $db->prepare('DELETE FROM headphones WHERE id = :id');
        $data = array(":id" => htmlspecialchars(strip_tags($id)));
        return $req->execute($data);
    }

    private static function uploadImage($image) {
        if($image){

            //Fem servir la funcio sha1_file() per assignar un nom d'arxiu unic
            $target_directory = "uploadsHP/";
            $target_file = $target_directory . $image;
            $file_type = pathinfo($target_file, PATHINFO_EXTENSION);

            //Assignem el valor buit al missatge d'error
            $file_upload_error_messages="";

            //Comprovem que l'arxiu es una imatge
            $check = getimagesize($_FILES["image"]["tmp_name"]);

            //Si es una imatge no fa res
            if($check!==false){
            //Si no es una imatge
            } else {
                $file_upload_error_messages.="<div>L'arxiu no és una imatge.</div>";
            }

            //Comprovem el tipus dárxiu
            $allowed_file_types=array("jpg", "jpeg", "png", "gif");
            if(!in_array($file_type, $allowed_file_types)){
                $file_upload_error_messages.="<div>Només són permesos arxius JPG, JPEG, PNG i GIF.</div>";
            }

            //COmprovem que no existeixi ja lárxiu a la carpeta
            if(file_exists($target_file)){
                $file_upload_error_messages.="<div>La imatge ja existeix. Prova a canviar el nom</div>";
            }

            //Comprovem que l'arxiu no sigui mes gran de 1 MB
            if($_FILES['image']['size'] > (1024000)){
                $file_upload_error_messages.="<div>La imatge no pot ser més gran de 1 MB</div>";
            }

            //Comprovem que a¡existeix la carpeta uploads i la creem si no es aixi
            if(!is_dir($target_directory)){
                mkdir($target_directory, 0777, true);
            }


            //Si $file_upload_error_messages es buit
            if(empty($file_upload_error_messages)){
                //No hi ha errors, pujem la imatge
                if(move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)){
                    //Hem pujat la foto amb èxit
                }else{
                    $result_message.="<div class='alert alert-danger'>";
                    $result_message.="<div>No s'ha pogut pujar la imatge.</div>";
                    $result_message.="</div>";
                }
            }

            //Si $file_upload_error_messages no es buit
            else{
                //Mostrem els errors per pantalla
                $result_message.="<div class='alert alert-danger'>";
                $result_message.="{$file_upload_error_messages}";
                $result_message.="</div>";
            }
        }
    }
}
?>
