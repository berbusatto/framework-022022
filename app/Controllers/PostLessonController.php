<?php 

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class PostLessonController extends AbstractControllers {
    private $params;
    private $attrName;

    public function execute(){
        try{
            $response = ['success'=>true];
            $this->params = $this->processServerElements->getInputJSONData();
            $this->verificationInputVar();

            $query = "INSERT INTO car (name, car_model, year, motorization) VALUES (:name, :car_model, :year, :motorization";

            $statement = $pdo->prepare($query);
            $statement->execute([
                ':name' => $params["name"],
                ':car_model' => $params["car_model"],
                ':year' => $params["year"],
                ':motorization' => $params["motorization"]
            ]);
            
        } catch (\Exception $e){
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAtribute' => $this->attrName            
            ];
        }
        
        view($response);
    }

    public function verificationInputVar(){

        if(!$this->params['name']){
            $this->attrName = 'name';
            throw new \Exception('ERROR: Missing NAME on request.');
        }

        if(!$this->params['name']){
            $this->attrName = 'name';
            throw new \Exception('ERROR: Missing NAME on request.');
        }


    }

}