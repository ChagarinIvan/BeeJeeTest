<?php

class Model_Main extends Data_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_data($param)
    {
        return parent::get_data($param); // TODO: Change the autogenerated stub
    }

    public function sorted_by($param)
    {
        if (!isset($_SESSION)){
            session_start();
        }
        $_SESSION['sort']=$param;
    }


}