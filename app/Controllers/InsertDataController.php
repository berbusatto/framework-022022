<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;
use App\FrameworkTools\Database\DatabaseConnection;

class InsertDataController extends AbstractControllers{
    public function execute() {
            
        dd($_POST['name']);
        
        view([
                'success'=> true
            ]);
    }
}

