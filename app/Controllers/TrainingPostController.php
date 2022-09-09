<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;

class TrainingPostController extends AbstractControllers{
    public function execute() {       
        
        var_dump($_POST);
       


       

            // $databaseConnection = DatabaseConnection::start()->getPDO();

            // $insertQuery = $databaseConnection
            //         ->query("INSERT INTO user(user.name, user.last_name) VALUES ('{$namee}', '{$lastName}');")
            //         ->fetchAll();

        
    }
}
