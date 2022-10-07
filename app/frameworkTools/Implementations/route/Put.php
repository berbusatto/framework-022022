<?php 
namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\nomecontrollerPUT;


trait Put {
    private static function put(){
        switch(self::$processServerElements->getRoute()){
            case '/first-put':
                return null;
        }
    }
}
