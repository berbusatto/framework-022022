<?php

    namespace App\FrameworkTools\Implementations\FactoryMethods;

    trait BreakStringInVars{ // É UMA PARTE DE UMA CLASSE QUE FOI MODULARIZADA

        public function breakStringInVars($requestUri){
            $uriAndVars = explode("?", $requestUri);
            
            if(!isset($uriAndVars[1])){
                return;
            }

            $stringWithVars = $uriAndVars[1];
            $arrayWithVars = explode("&", $stringWithVars);


            $varsOfUrl = array_map(function($element){
                return explode("=", $element); // CALLBACK FUNCTION
            }, $arrayWithVars);

           dd($varsOfUrl);
        }

    }