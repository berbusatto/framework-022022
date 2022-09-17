<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

use App\FrameworkTools\Database\DatabaseConnection;

class ProjectTasksController extends AbstractControllers {

    // retorna todos os carros
    public function getCar() {
        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqCar = $databaseConnection
        ->query("SELECT * FROM car;")->fetchAll();
        view($reqCar);
    }


    //  retorna os carros com determinado id
    public function getCarById(){
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;        

        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqCar = $databaseConnection
                ->query("SELECT * FROM car WHERE car.id_car = '{$valueOfVariable}';")->fetchAll();
        
        view($reqCar);
    }


    // retorna todos os carros com determinado nameCar
    public function getCarByname(){
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;        

        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqCar = $databaseConnection
                ->query("SELECT * FROM car WHERE car.name = '{$valueOfVariable}';")->fetchAll();
        
        view($reqCar);

    }

    
    // retorna todos os vendedores
    public function getSellers(){
        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqSeller = $databaseConnection
        ->query("SELECT * FROM seller;")->fetchAll();
        
        view($reqSeller);

    }


    // retorna todos os vendedores com determinado id
    public function getSellerById(){
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;        

        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqSeller = $databaseConnection
                ->query("SELECT * FROM seller WHERE seller.id_seller = '{$valueOfVariable}';")->fetchAll();
        
        
        view($reqSeller);

    }


    // retorna todos os vendedores com o nome nameSeller
    public function getSellerByName(){
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;        

        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }
        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqSeller = $databaseConnection
                ->query("SELECT * FROM seller WHERE seller.name = '{$valueOfVariable}';")->fetchAll();        
        
        view($reqSeller);
    }


    // retorna todos os carros vendidos por nameSeller 
    public function getSellByName(){
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $reqSell = $databaseConnection
                ->query("SELECT * FROM car WHERE car.id_car IN (SELECT sells.id_car FROM sells WHERE sells.id_seller = (SELECT seller.id_seller FROM seller WHERE seller.name = '{$valueOfVariable}'));")
                ->fetchAll();

        view($reqSell);
    }


    // retorna todos os compradores
    public function getBuyers(){

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqBuyer = $databaseConnection
        ->query("SELECT * FROM buyer;")->fetchAll();
        
        view($reqBuyer);
    }


    // retorna todos os compradores com determinado id
    public function getBuyersById(){
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;        

        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqBuyer = $databaseConnection
                ->query("SELECT * FROM buyer WHERE buyer.id_buyer = '{$valueOfVariable}';")->fetchAll();        
        
        view($reqBuyer);
    }


    // retorna todos os compradores com o nome nameBuyer
    public function getBuyerByName(){
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;        

        foreach ($requestsVariables as $value) {
            $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();
        $reqBuyer = $databaseConnection
                ->query("SELECT name, last_name FROM buyer WHERE buyer.name = '{$valueOfVariable}';")->fetchAll();        
        
        view($reqBuyer);
    }


    // retorna todos os carros comprados por nameBuyer
    public function getCarsByBuyerName(){
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
                $valueOfVariable = $value["value"];
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $reqCars = $databaseConnection
                ->query("SELECT * FROM car WHERE car.id_car IN (SELECT sells.id_car FROM sells WHERE sells.id_buyer = (SELECT buyer.id_buyer FROM buyer WHERE buyer.name = '{$valueOfVariable}'));")
                ->fetchAll();

        view($reqCars);
    }








}