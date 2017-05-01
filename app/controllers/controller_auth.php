<?php
class Controller_Auth extends Controller {

    function __construct()
    {
        $this->model = new Model_Auth();
        $this->view = new View();
    }

    public function action_index()
    {
        $this->view->generate('auth_view.php', 'template_view.php');
    }
}