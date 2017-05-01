<?php

class Controller_Admin extends Controller {

    function __construct()
    {
        $this->model = new Model_Admin();
        $this->view = new View();
    }

    public function action_index($param)
    {
        $data = $this->model->get_data($param);
        $this->view->generate('admin_view.php', 'template_view.php', $data);
    }

    public function action_create()
    {
        $page = $this->model->create();
        $this->action_index($page);
    }
}