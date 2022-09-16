<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;

class InsertDataController extends AbstractControllers{
    public function execute() {

        $pdo = DatabaseConnection::start()->getPDO();

        $params = $this->processServerElements->getInputJSONData();

        $query = "INSERT INTO user (name, last_name, age) VALUES (:name, :last_name, :age)";

        $statement = $pdo->prepare($query);

        $statement->execute([
            ':name'=> $params["name"],
            ':last_name'=> $params["lastname"],
            ':age' => $params["age"]
        ]);

       

        view([
                'success'=> true
            ]);
    }
}

