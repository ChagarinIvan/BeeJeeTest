<?php

class Controller_Create extends Controller {

    function __construct()
    {
        $this->model = new Model_Create();
        $this->view = new View();
    }

    public function action_index()
    {
        $this->model->create();
    }
}