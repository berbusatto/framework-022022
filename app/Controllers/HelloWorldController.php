<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class HelloWorldController extends AbstractControllers{
    public function execute(){

        
        $requestVariables = $this->processServerElements->getVariables();
        $valueOfVariable;  


        foreach($requestVariables as $value){
            if($value['name'] == "info"){
                $valueOfVariable = $value["value"];
            }
        }

        view([
            "name" => "API to learn",
            "version" => 1,
            "value_of_variable" => $valueOfVariable,
            "manager_developer" => "Bernardo Busatto",
            "website_company" => "http://bernardobusatto.ml"
        ]);
    }
}