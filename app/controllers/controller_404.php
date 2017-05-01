<?php

class Controller_404 extends Controller {
    public function action_index(){
        $this->view->generate('404.php', 'template_view.php', null, $_SESSION['lang']);
    }
}