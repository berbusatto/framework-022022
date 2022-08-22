<?php

namespace App\FrameworkTools\Implementations\Route;

use app\FrameworkTools\ProcessServerElements;

class RouteProcess{
    public static function execute(){
        $processServerElements = ProcessServerElements::start();

        dd($processServerElements);
    }
}