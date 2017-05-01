<?php

class Data_Model extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function get_data($param)
    {

        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['auth'] = false;
        $bd = $this->db;

        if (isset($_SESSION['sort'])){
            $sort_string=$_SESSION['sort'];
        } else {
            $sort_string=Model::ID;
        }
        switch ($sort_string){
            case Model::ID:
                $return_data['sort'] =1;
                break;
            case Model::EMAIL:
                $return_data['sort'] =0;
                break;
            case Model::STATUS:
                $return_data['sort'] =2;
                break;
        }
        $quer = "SELECT * from `tasks` ORDER BY $sort_string";
        $query = $bd->query($quer, PDO::FETCH_ASSOC);
        $data = $query->fetchAll();

        $count_of_tasks = count($data);
        if ($count_of_tasks > 3) {
            $count_of_page = ceil($count_of_tasks / 3);
            if ($param > $count_of_page || $param == null) {
                $page = 1;
            } else {
                $page = $param;
            }
            $return_data['pagination'] = true;
            $return_data['count'] = $count_of_tasks;
            $return_data['page'] = $page;
            $return_data['count_of_page'] = $count_of_page;
            $return_data['data'] = array_slice($data, ($page - 1) * 3, 3);
        } else {
            $return_data['pagination'] = false;
            $return_data['data'] = $data;
        }
        return $return_data;
    }
}