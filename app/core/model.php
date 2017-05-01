<?php

class Model {
    const EMAIL = '`email`';
    const ID = '`id` DESC';
    const STATUS = '`is_done`';
    public $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function get_data($param=null){

    }
}