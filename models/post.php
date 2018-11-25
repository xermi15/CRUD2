<?php
class Post {

    // definimos tres atributos
    // los declaramos como públicos para acceder directamente $post->author
    public $id;
    public $author;
    public $title;
    public $content;
    public $image;
    public $date_create;
    public $date_modification;

    public function __construct($id, $author, $title, $content, $image, $date_create, $date_modification,) {
        $this->id = $id;
        $this->author = $author;
        $this->title = $title
        $this->content = $content;
        $this->image = $image;
        $this->date_create = $date_create;
        $this->date_modification = $date_modification;
    }

    public static function all() {
        $list = [];
        $db = Db::getInstance();
        $req = $db->query('SELECT * FROM posts');

        // creamos una lista de objectos post y recorremos la respuesta de la consulta
        foreach($req->fetchAll() as $post) {
            $list[] = new Post($post['id'], $post['author'], $post['title'],$post['content'], $post['image'], $post['date_create'], $post['date_modification'],);
        }
        return $list;
    }

    public static function find($id) {
        $db = Db::getInstance();

        // nos aseguramos que $id es un entero
        $id = intval($id);
        $req = $db->prepare('SELECT * FROM posts WHERE id = :id');

        // preparamos la sentencia y reemplazamos :id con el valor de $id
        $req->execute(array('id' => $id));
        $post = $req->fetch();

        return new Post($post['id'], $post['author'], $post['title'],$post['content'], $post['image'], $post['date_create'], $post['date_modification'],);
    }

    public static function insert($title, $author, $content, $image, $date_create, $date_modification {

        $db = Db::getInstance();
        $req = $db->prepare('INSERT INTO posts SET author = :author, title = :title, content = :content, image = :image, date_create = :date_create, date_modification = :date_modification');
        $data = array(
            ":author" => htmlspecialchars(strip_tags($author)),
            ":title" => htmlspecialchars(strip_tags($title)),
            ":content" => htmlspecialchars(strip_tags($content)),
            ":image" => htmlspecialchars(strip_tags($image)),
            ":date_create" => htmlspecialchars(strip_tags($date_create)),
            ":date_modification" => htmlspecialchars(strip_tags($date_modification))
        );

        if ($req->execute($data)){

            // Inserció correcta
            Post::uploadImage($image);
            header('Location: '.constant('URL')."posts/insert/success");

        } else {

            // Error a linsertar
            header('Location: '.constant('URL')."posts/insert/error");
        }
    }

    private static function uploadImage($image) {
        if($image){

            //Fem servir la funcio sha1_file() per assignar un nom d'arxiu unic
            $target_directory = "uploads/";
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
?>
