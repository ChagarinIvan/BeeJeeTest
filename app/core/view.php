<?php

class View {
    public function generate($content_view, $template_view, $data = array()){
        include 'app/views/'.$template_view;
    }
}