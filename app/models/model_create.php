<?php

class Model_Create extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function create(){
        if (!isset($_SESSION)){
            session_start();
        }
        $_SESSION['auth']=false;
        $login=strip_tags($_POST['name']);
        $email=strip_tags($_POST['email']);
        $text=strip_tags($_POST['text']);
        //login verify
        $sth = $this->db->prepare("INSERT INTO `tasks` (`id`, `name`, `text`, `email`, `image`, `is_done`) VALUES (NULL, :name, :text, :email, :image, false);");
        $file = $this->resize_image();
        //create data array for query
        $data = array(
            'name' => $login,
            'text' => $text,
            'email' => $email,
            'image' => $file,
        );
        $state = $sth->execute($data);
        if ($state){
            header('Location: /main/');
        }
    }

    function check_png(&$prefix, &$im1){
        if ($prefix=='png'){
            imagealphablending($im1, false );
            imagesavealpha($im1, true );
        }
    }

    function resize_image(){
        $file_name = $_FILES['image']['name'];

        //check image
        $file_array = explode('.', $file_name);
        //download image
        $prefix = $file_array[count($file_array) - 1];

        $file_name = $_FILES['image']['tmp_name'];
        switch($_FILES['image']['type']) { // узнаем тип картинки
            case "image/gif": $im = imagecreatefromgif($file_name); break;
            case "image/jpeg": $im = imagecreatefromjpeg($file_name); break;
            case "image/png": $im = imagecreatefrompng($file_name); break;
        }
        list($w,$h) = getimagesize($file_name);// берем высоту и ширину
        if ($w>320||$h>240){
            if (($w/$h)>(320/240)){
                $koe=$w/320;
                $new_h=ceil($h/$koe); // с помощью коэффициента вычисляем высоту
                $im1 = imagecreatetruecolor(320, $new_h);
                $this->check_png($prefix,$im1);
                imagecopyresampled($im1,$im,0,0,0,0,320,$new_h,imagesx($im),imagesy($im));
            } else {
                $koe=$h/240;
                $new_w=ceil($w/$koe);// с помощью коэффициента вычисляем ширину
                $im1 = imagecreatetruecolor($new_w, 240);
                $this->check_png($prefix,$im1);
                imagecopyresampled($im1,$im,0,0,0,0,$new_w,240,imagesx($im),imagesy($im));
            }
            if ($prefix=='png'){
                imagepng( $im1, $file_name, 9 ); // переводим в jpg
            }else{
                imagejpeg($im1, $file_name, 100); // переводим в jpg
            }
            imagedestroy($im);
            imagedestroy($im1);
        }
        
        $name = $this->generate_file_name();
        $file = 'images/' . $name . '.' . $prefix;
        move_uploaded_file($file_name, $file);
        return $file;
    }

    function generate_file_name(){
        $charses = "123456789zxcvbnmasdfghjklqwertyuiopZXCVBNMASDFGHJKLQWERTYUIOP";
        $numChars = strlen($charses);
        $string = "";
        for ($i = 0; $i < 10; $i++) {
            $string.= substr($charses, rand(1, $numChars) - 1, 1);
        }
        return $string;
    }
}