<?php

namespace App\FrameworkTools\Implementations\Route;

use App\FrameworkTools\ProcessServerElements;
use App\Controllers\HelloWorldController;
use App\Controllers\TrainingQueryController;
use App\Controllers\TrainingPostController;
use App\Controllers\InsertDataController;
use App\Controllers\ProjectTasksController;
use App\Controllers\PostLessonController;


class RouteProcess{

    private static $processServerElements;

    public static function execute(){
        self::$processServerElements = ProcessServerElements::start();
        $routeArray = [];


       
        switch(self::$processServerElements->getVerb()){

            case 'GET':
                return self::get();
            case 'POST':
                return self::post();
            case 'PUT':
                return self::put();
            case 'DELETE':
                return self::delete();
            }
        }

    private static function get(){
        switch(self::$processServerElements->getRoute()){

            case '/hello-world':
                return (new HelloWorldController)->execute();
            break;
            
            case '/training-query':
                return (new TrainingQueryController)->execute();
            break;

            case '/retorna-carros':
                return (new ProjectTasksController)->getCar();
            break;    
            case '/retorna-carros-id':
                return (new ProjectTasksController)->getCarById(); 
            break;
            case '/retorna-carros-nome':
                return (new ProjectTasksController)->getCarByname();
            break;        
            case '/retorna-vendedor':
                return (new ProjectTasksController)->getSellers();
            break;
            case '/retorna-vendedor-id':
                return (new ProjectTasksController)->getSellerById();
            break;
            case '/retorna-vendedor-nome':
                return (new ProjectTasksController)->getSellerByName();
            break;
            case '/retorna-vendas-nome':
                return (new ProjectTasksController)->getSellByName();
            break;

            case '/retorna-compradores':
                return (new ProjectTasksController)->getBuyers();
            break;

            case '/retorna-compradores-id':
                return (new ProjectTasksController)->getBuyersById();
            break;
            
            case '/retorna-comprador-nome':
                return (new ProjectTasksController)->getBuyerByName();
            break;
                
            case '/retorna-carros-comprador-nome':
                return (new ProjectTasksController)->getCarsByBuyerName();
            break;  
            }

        }
        


                
    //             switch($this->processServerElements->getRoute()){

    //                 case '/hello-world':
    //                     return (new HelloWorldController)->execute();
    //                 break;

    //                 case '/training-query':
    //                     return (new TrainingQueryController)->execute();
    //                 break;

    //                 case '/retorna-carros':
    //                     return (new ProjectTasksController)->getCar();
    //                     break;

    //                 case '/retorna-carros-id':
    //                     return (new ProjectTasksController)->getCarById(); 
    //                     break;

    //                 case '/retorna-carros-nome':
    //                     return (new ProjectTasksController)->getCarByname();
    //                     break;

    //                 case '/retorna-vendedor':
    //                     return (new ProjectTasksController)->getSellers();
    //                     break;

    //                 case '/retorna-vendedor-id':
    //                     return (new ProjectTasksController)->getSellerById();
    //                     break;

    //                 case '/retorna-vendedor-nome':
    //                     return (new ProjectTasksController)->getSellerByName();
    //                     break;

    //                 case '/retorna-vendas-nome':
    //                     return (new ProjectTasksController)->getSellByName();
    //                     break;

    //                 case '/retorna-compradores':
    //                     return (new ProjectTasksController)->getBuyers();
    //                     break;

    //                 case '/retorna-compradores-id':
    //                     return (new ProjectTasksController)->getBuyersById();
    //                     break;
                    
    //                 case '/retorna-comprador-nome':
    //                     return (new ProjectTasksController)->getBuyerByName();
    //                     break;
                        
    //                 case '/retorna-carros-comprador-nome':
    //                     return (new ProjectTasksController)->getCarsByBuyerName();
    //                     break;

                
    //             }

    //         case 'POST':

    //             switch($this->processServerElements->getRoute()){
    //                 case '/first-post':
    //                     return (new TrainingPostController)->execute();
    //                 break;

    //                 case '/insert-data':
    //                     return (new InsertDataController)->execute();
    //                 break;

    //                 case '/carinsert':
    //                     return (new PostLessonController)->execute();
       
    //             }

    //             case 'PUT':

    //                 switch($this->processServerElements->getRoute()){
    //                     case '/first-put':
    //                         return null;
    //                 }
        
    //         // case 'DELETE':
    //     }
    // }


    
}