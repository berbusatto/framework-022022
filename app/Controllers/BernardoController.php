<?php 

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;

class BernardoController extends AbstractControllers {
    private $params;
    private $attrName; 


    //GET
    public function busatto21(){
    
        $databaseConnection = DatabaseConnection::start()->getPDO();
        $pets = $databaseConnection->query(
                "SELECT * FROM petshop;"
        )->fetchAll();
        view($pets);
    }   
    
    //POST
    public function busatto666(){
              
        try{
            $response = ['success'=>true];
            $this->params = $this->processServerElements->getInputJSONData();

            $query = "INSERT INTO petshop (name_pet, type_service) VALUES (:name_pet, :type_service)";
            
            $statement = $this->pdo->prepare($query);

            $statement->execute([
                ':name_pet' => $this->params['name_pet'],
                ':type_service' => $this->params['type_service']
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


    // PUT
    public function bernardo000(){

    }




    // DELETE
    public function bernardo91(){
        
    }
}