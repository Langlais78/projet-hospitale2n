<?php

namespace Controllers;

abstract class Controller{

    protected $model;
    protected $nameModel;

    public function __construct()
    {
        $this->model = new $this->nameModel();
    }

}