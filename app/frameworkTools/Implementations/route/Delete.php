<?php 
namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\UpdateDataController;

trait Delete {
    private static function delete(){
        switch(self::$processServerElements->getRoute()){
            case 'busatto91':
                return (new BernardoController)->busatto91();
        }
    }
}
