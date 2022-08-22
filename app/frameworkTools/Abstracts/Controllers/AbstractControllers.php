<?php

// PAI DE TODOS OS CONTROLLERS
namespace App\FrameworkTools\Abstracts\Controllers;

abstract class AbstractControllers {
    
    protected $processServerElements;
    public function __construct(){
        $this->processServerElements = ProcessServerElements::start();

    }

}