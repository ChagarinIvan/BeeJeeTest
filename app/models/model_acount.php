<?php

class Model_Acount extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_data()
    {
        if (!isset($_SESSION)){
            session_start();
        }
        $_SESSION['auth']=false;
        $login = $_POST['login'];
        $pass = $_POST['password'];
        $quer="SELECT `password` from `users` WHERE BINARY `login`='$login'";
        $bd=$this->db;
        $query=$bd->query($quer, PDO::FETCH_ASSOC);
        $row = $query->fetch();
        if (!empty($row)) {
            if ($pass == $row['password']) {
                $_SESSION['auth']=true;
                header('Location: /admin/');
                return;
            }
        }
        $_SESSION['result']=true;
        header('Location: /auth/');
    }

}