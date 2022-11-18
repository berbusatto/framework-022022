<?php 
namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\UpdateDataController;
use App\Controllers\BernardoController;

trait Put {
    private static function put(){
        switch(self::$processServerElements->getRoute()){
            case '/update-data':
                return (new UpdateDataController)->execute();
            break;
            case '/busatto000':
                return (new BernardoController)->busatto000();
        }
    }
}
