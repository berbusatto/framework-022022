<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class DeleteController extends AbstractControllers{

    public function execute(){
        $requestsVariables = $this->processServerElements->getVariables();
        $idUser;

        foreach($requestsVariables as $valueVariable){
            if($valueVariable['name'] === "id_user"){
                $idUser = $valueVariable['value'];
            }
        }
        dd($idUser);
    }
}