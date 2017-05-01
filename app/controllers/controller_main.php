<?php

class Controller_Main extends Controller {

    function __construct()
    {
        $this->model = new Model_Main();
        $this->view = new View();
    }

    function action_index($param)
    {
        $data = $this->model->get_data($param);
        $this->view->generate('main_view.php', 'template_view.php', $data);
    }

    function action_sortemail()
    {
        $this->model->sorted_by(Model::EMAIL);
        $this->action_index(1);
    }
    function action_sortcreation()
    {
        $this->model->sorted_by(Model::ID);
        $this->action_index(1);
    }
    function action_sortstatus()
    {
        $this->model->sorted_by(Model::STATUS);
        $this->action_index(1);
    }
}