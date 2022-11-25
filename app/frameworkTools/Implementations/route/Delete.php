<?php 
namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\BernardoController;
use App\Controllers\DeleteController;

trait Delete {
    private static function delete(){
        switch(self::$processServerElements->getRoute()){
            case '/busatto91':
                return (new BernardoController)->busatto91();
            case '/teste':
                return (new DeleteController)->execute();
        }
    }
}
