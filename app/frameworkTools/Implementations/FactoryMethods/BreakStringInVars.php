<?php

    namespace App\FrameworkTools\Implementations\FactoryMethods;

    trait BreakStringInVars{ // É UMA PARTE DE UMA CLASSE QUE FOI MODULARIZADA

        public function breakStringInVars($requestUri){
            $uriAndVars = explode("?", $requestUri);
            
            if(!isset($uriAndVars[1])){ // RETORNA SE O ARRAY TIVER APENAS UMA POSIÇÃO
                return;
            }

            $stringWithVars = $uriAndVars[1];
            $arrayWithVars = explode("&", $stringWithVars);


            return array_map(function($element){
                $nameAndValue =  explode("=", $element); //CALLBACK FUNCTION - PASSANDO UM MÉTODO COMO ARGUMENTO EM OUTRO MÉTODO
                return[
                    "name" => $nameAndValue[0],
                    "value" => $nameAndValue[1]
                ];
            }, $arrayWithVars);

           dd($varsOfUrl);
        }

    }