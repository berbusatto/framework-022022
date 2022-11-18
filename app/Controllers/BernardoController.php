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
    public function busatto000(){
        $missingAttribute;

        $response = [
            'success' => true
        ];

        try{
            $requestVariables =  $this->processServerElements->getVariables();

            if ((!$requestVariables) || (sizeof($requestVariables) === 0)){
                $missingAttribute = 'id_petshop';
                throw (new \Exception("Insert variable in URL."));
            }

            foreach ($requestVariables as $requestVariable){
                if ($requestVariable['name'] === 'id_petshop'){
                    $idPetshop = $requestVariable['value'];
                }
            }        

            if(!$idPetshop){
                $missingAttribute = 'id_petshop';
                throw (new \Exception("Empty or incorrect id_petshop."));
            }

            $pet = $this->pdo->query("SELECT * FROM petshop WHERE id_petshop = '{$idPetshop}';")
            ->fetchAll();

            if(sizeof($pet) === 0){
                $missingAttribute = 'id_petshop';
                throw new \Exception("Record did not found.");
            }

            $params = $this->processServerElements->getInputJSONData();
            

            if ((!$params) || sizeof($params) === 0){
                $missingAttribute = 'params';
                throw new \Exception("You need to inform some data.");
            }

            $updateStructureQuery = '';


            foreach ($params as $key => $value){

                $toStatement = [];
                if (!in_array($key,['name_pet','type_service'])){
                    $missingAttribute = 'keynotacceptable';
                    throw new \Exception($key);
                }
                

                if ($key === 'name_pet'){
                    $updateStructureQuery .= "name_pet = :name_pet,";
                    $toStatement[':name_pet'] = $value;
                }

                if ($key === 'type_service'){
                    $updateStructureQuery .= " type_service = :type_service,";
                    $toStatement[':type_service'] = $value;
                }                
            }
            
            $newStringElementsSQL = substr($updateStructureQuery, 0,-1);
            
            $sql = "UPDATE petshop SET {$newStringElementsSQL} WHERE id_petshop = {$idPetshop}";

            
            //UPDATE petshop SET name_pet = :name_pet,type_service = :type_service WHERE id_petshop = 1
            $statement = $this->pdo->prepare($sql);            
            
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

    // DELETE
    public function busatto91(){

    }
}