<?php 
namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\TrainingPostController;
use App\Controllers\InsertDataController;
use App\Controllers\PostLessonController;
use App\Controllers\BernardoController;

trait Post {
    private static function post(){
        switch(self::$processServerElements->getRoute()){
            case '/first-post':
                return (new TrainingPostController)->execute();
            break;

            case '/insert-data':
                return (new InsertDataController)->execute();
            break;

            case '/carinsert':
                return (new PostLessonController)->execute();
            break;
            
            // TRABALHO 25/10
            case '/busatto666':
                return (new BernardoController)->busatto666();
            break;
        }
    }
}