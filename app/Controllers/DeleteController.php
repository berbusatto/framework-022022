<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class DeleteController extends AbstractControllers{

    public function execute(){
        $requestsVariables = $this->processServerElements->getVariables();
        $response = ['sucess' => true];
        $idUser;
        $missingAttribute;

        try{
            foreach($requestsVariables as $valueVariable){
                if($valueVariable['name'] === 'id_user'){
                    $idUser = $valueVariable['value'];
                }
            }
            
            if(!$idUser){
                $missingAttribute = 'userIdNull';
                throw new \Exception("You need to inform userId");
            }

            $users = $this->pdo->query("SELECT * FROM user WHERE id_user ='{$idUser}';")->fetchAll();

            if(sizeof($users) === 0){
                $missingAttribute = 'userDoesntExists';
                throw new \Exception("No record of this user");
            }

            $sql = 'DELETE FROM user WHERE id_user = :id_user';
    
            $statement = $this->pdo->prepare($sql);
            $statement->execute(['id_user'=> $idUser]);
          

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