<?php

class Application{

    public static function process(){

        $nameController = "Index";
        $action = "index";

        if(!empty($_GET['controller'])){
            $nameController = ucfirst($_GET['controller']);
        }

        if(!empty($_GET['action'])){
            $action= $_GET['action'];
        }

        $nameController = "\Controllers\\" . $nameController;

        $controller = new $nameController();
        $controller->$action();

    }

}