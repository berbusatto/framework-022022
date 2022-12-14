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
                $missingAttribute = 'missingid_carinurl';
                throw (new \Exception("Insert variable in URL."));
            }

            foreach ($requestVariables as $requestVariable){
                if ($requestVariable['name'] === 'id_car'){
                    $carId = $requestVariable['value'];
                }
            }           

            if(!$carId){
                $missingAttribute = 'id_carnotvalid';
                throw (new \Exception("id_car is not valid."));
            }

            $cars = $this->pdo->query("SELECT * FROM car WHERE id_car = '{$carId}';")
                ->fetchAll();

            if(sizeof($cars) === 0){
                $missingAttribute = 'thiscardoesnotexist';
                throw new \Exception("Record did not found.");
            }

            $params = $this->processServerElements->getInputJSONData();

            if ((!$params) || sizeof($params) === 0){
                $missingAttribute = 'paramsdoesnotexists';
                throw new \Exception("You need to inform the params attribute.");
            }

             //MANIPULANDO A STRING QUE SERA O QUERY DO SQL POSTERIORMENTE
            $updateStructureQuery = '';

            foreach ($params as $key => $value){

                $toStatement = [];
                if (!in_array($key,['name','car_model', 'year', 'motorization'])){
                    $missingAttribute = 'keynotacceptable';
                    throw new \Exception($key);
                }

                if ($key === 'name'){
                    $updateStructureQuery .= "name = :name,";
                    $toStatement[':name'] = $value;
                }

                if ($key === 'car_model'){
                    $updateStructureQuery .= "car_model = :car_model,";
                    $toStatement[':car_model'] = $value;

                }

                if ($key === 'year'){
                    $updateStructureQuery .= "year = :year,";
                    $toStatement[':year'] = $value;
                }

                if ($key === 'motorization'){
                    $updateStructureQuery .= "motorization = :motorization,";
                    $toStatement[':motorization'] = $value;
                }
            }

            // DARIA PRA RESOLVER S?? COM O SUBSTR (EU ACHO)
            // dd(substr($updateStructureQuery,0,-1));


            // PARA REMOVER A V??RGULA DO FINAL DA STRING
            // CONVERTE-SE STRING EM ARRAY
            $updatedStringInArray = str_split($updateStructureQuery);

            //REMOVE O ??LTIMO ELEMENTO
            array_pop($updatedStringInArray);

            // CONVERTE O ARRAY PARA STRING
            $newStringElementsSQL = implode($updatedStringInArray);
            
            // dd($updatedStringInArray);

            $sql = "UPDATE car SET {$newStringElementsSQL} WHERE id_car = {$carId}";            

            $statement = $this->pdo->prepare($sql);
            // dd($statement);
            
            $statement->execute($toStatement);

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