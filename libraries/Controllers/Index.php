<?php

namespace Controllers;

class Index{

    public function index(){

        $pageTitle = 'Accueil';
        
        \Renderer::render('index', compact('pageTitle'));
    }

}