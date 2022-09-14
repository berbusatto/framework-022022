<?php

namespace App\FrameworkTools\Implementations\Route;

use App\FrameworkTools\ProcessServerElements;
use App\Controllers\HelloWorldController;
use App\Controllers\TrainingQueryController;
use App\Controllers\TrainingPostController;
use App\Controllers\InsertDataController;

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

            case 'POST':

                switch($processServerElements->getRoute()){
                    case '/first-post':
                        return (new TrainingPostController)-> execute();
                    break;

                    case '/insert-data':
                        return (new InsertDataController)-> execute();
                    break;
                    
                }
        
            // case 'DELETE':
        }
    }
}