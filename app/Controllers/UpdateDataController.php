<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;


class UpdateDataController extends AbstractControllers{

    public function execute(){
        $missingAttribute;
        $response = [
            'success' => true
        ];
        try{
            
            $requestVariables =  $this->processServerElements->getVariables();

            if ((!$requestVariables) || (sizeof($requestVariables) === 0)){
                $missingAttribute = 'car_id is null';
                throw (new \Exception("Insert variable in URL"));
            }

            foreach ($requestVariables as $requestVariable){
                if ($requestVariable['name'] === 'id_car'){
                    $carId = $requestVariable['value'];
                }
            }

            if(!$carId){
                $missingAttribute = 'id_car is empty';
                throw (new \Exception("car_id is not valid"));
            }

            $cars = $this->pdo->query("SELECT * FROM car WHERE id_car = '{$carId}';")
                ->fetchAll();

            if(sizeof($cars) === 0){
                $missingAttribute = 'this car does not exist';
                throw new \Exception("Record did not found.");
            }

            $params = $this->processServerElements->getInputJSONData();
            dd($params);
                       

        } catch(\Exception $e){
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $missingAttribute
            ];
        }
        view($response);        
    }
}