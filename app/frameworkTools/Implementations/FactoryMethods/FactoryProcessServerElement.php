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
            $this->processServerElements->setDocumentRoot($_SERVER['DOCUMENT_ROOT']);
            $this->processServerElements->setDocumentRoot($_SERVER['SERVER_NAME']);
            dd($this->processServerElements);
            // continua no próximo episódio...

        }

    }