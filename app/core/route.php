<?php

class Route {

    static function start() {

        $controller_name = 'Main';
        $action_name = 'index';

        $routes = explode('/', $_SERVER['REQUEST_URI']);
        if( !empty($routes[1])){
            $controller_name = $routes[1];
        }
//        echo $controller_name;
//        echo '<br>';
        if (!empty($routes[2])){
            $action_name = $routes[2];
        }
//        echo $action_name;
//        echo '<br>';
        $model_name = 'Model_'.$controller_name;
        $controller_name = 'Controller_'.$controller_name;
        $action_name = 'action_'.$action_name;
//        echo $model_name;
//        echo '<br>';
//        echo $controller_name;
//        echo '<br>';
//        echo $action_name;
//        echo '<br>';
        $model_file = strtolower($model_name).'.php';
        $model_path = "app/models/". $model_file;
//        echo $model_file;
//        echo '<br>';
//        echo $model_path;
//        echo '<br>';
        if(file_exists($model_path)){
            include_once $model_path;
        }

        $controller_file = strtolower($controller_name).'.php';
        $controller_path = "app/controllers/". $controller_file;


        if(file_exists($controller_path)){
            include_once $controller_path;
        }else{
           Route::ErrorPage404();
        }

        $controller = new $controller_name;
        $action = $action_name;
//        echo $controller_name;
//        echo '<br>';
//        echo $action;
//        echo '<br>';
        $param=null;
        if (!empty($routes[3])){
            $param=$routes[3];
        }
        if(method_exists($controller, $action)){
            $controller->$action($param);
        }else{
            Route::ErrorPage404();
        }


    }

    function ErrorPage404() {
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'404');
    }

}