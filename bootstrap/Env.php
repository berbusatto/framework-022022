<?php

namespace Bootstrap;

class Env{

    // private $mainDir;
    
    // public function __construct() {
    //     $this->mainDir = __DIR__;
        
    // }

    public static function execute(){
        $contentOfEnvFile = file_get_contents( __DIR__ . "\..\.env");

        $arrayEnv = explode("\n", $contentOfEnvFile);

        foreach($arrayEnv as $value){
            $keyAndValue = explode("=", $value);

            if(!isset($keyAndValue[1])){
                continue; // pare aqui neste ciclo se o valor nao existir
            }
            $nameOfVariable = $keyAndValue[0];
            $valueOfVariable = $keyAndValue[1];

            $_ENV[$nameOfVariable] = $valueOfVariable;


        }
        
    }

}