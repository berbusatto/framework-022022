<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;

class InsertDataController extends AbstractControllers{
    public function execute() {
        

        $pdo = DatabaseConnection::start()->getPDO();
        $params = $this->processServerElements->getInputJSONData();

        $response = ['success'=>true];
        $attrName;

        try{
            if(!$params['name']){
                $attrName = 'name';
                throw new \Exception('ERROR: Missing name on request');
            }
    
            if(!$params['lastName']){
                $attrName = 'lastName';
                throw new \Exception('ERROR: Missing last name on request'); // USANDO / PARA USAR Exception SEM O USE 
            }
    
            if(!$params['age']){
                $attrName = 'age';
                throw new \Exception('ERROR: Missing age on request');
            }


            $query = "INSERT INTO user (name, last_name, age) VALUES (:name, :last_name, :age)";
            $statement = $pdo->prepare($query);

            $statement->execute([
                ':name'=> $params["name"],
                ':last_name'=> $params["lastName"],
                ':age' => $params["age"]
            ]);
   
            view([
                'success'=> true
            ]);

        } catch (\Exception $e){
            $response = [
                'success'=>false,
                'message'=>$e->getMessage(),
                'missingAttribute'=>$attrName
            ];

        }

        view($response);

    }
}

