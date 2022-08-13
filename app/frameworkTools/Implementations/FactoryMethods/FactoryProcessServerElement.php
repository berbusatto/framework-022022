<?php

    namespace App\FrameworkTools\Implementations\FactoryMethods;

    use App\FrameworkTools\Abstracts\FactoryMethods\AbstractFactoryMethods;
    use App\FrameworkTools\ProcessServerElements;

    class FactoryProcessServerElement extends AbstractFactoryMethods{

        private $processServerElements;

        public function __construct(){
            $this->processServerElements = ProcessServerElements::start(); // :: para acessar atributo/método static

        }

        public function operation(){
            dd($this->processServerElements);
            // continua no próximo episódio...
        }
    }