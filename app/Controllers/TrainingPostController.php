<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;

class TrainingPostController extends AbstractControllers{
    public function execute() {
        $requestsVariables = json_decode($this->processServerElements->getVariables());
        $valueOfVariable;
        
        var_dump($this->processServerElements->getVariables());

        foreach ($requestsVariables as $value) {
            if($value["name"] == "name") {
                $valueOfVariable = $value["value"];
            }
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $userInsert = $databaseConnection
                ->query("INSERT INTO user(user.name, user.last_name) VALUES ('{$valueOfVariable}', NULL);")
                ->fetchAll();

        view($users);
    }
}
