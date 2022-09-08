<?php

namespace App\FrameworkTools\Implementations\Route;

use App\FrameworkTools\ProcessServerElements;
use App\Controllers\HelloWorldController;
use App\Controllers\TrainingQueryController;

class RouteProcess{
    public static function execute(){
        $processServerElements = ProcessServerElements::start();

        $routeArray = [];
       
        switch($processServerElements->getVerb()){
            case 'GET':
                switch($processServerElements->getRoute()){
                    case '/hello-world':
                        return (new HelloWorldController)->execute();
                    break;
                    case '/training-query':
                        return (new TrainingQueryController)->execute();
                    break;
                }
            // case 'POST':
            //     return (new DataInputController)-> execute();

        }
       
    }
}