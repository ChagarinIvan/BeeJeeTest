<?php

class Controller_Acount extends Controller {

    function __construct()
    {
        $this->model = new Model_Acount();
        $this->view = new View();
    }

    public function action_index()
    {
        $data = $this->model->get_data();
        $this->view->generate('acount_view.php', 'template_view.php', $data, $_SESSION['lang']);
    }
}