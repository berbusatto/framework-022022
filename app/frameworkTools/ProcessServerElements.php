<?php

namespace APP\FrameworkTools;
class ProcessServerElements{
    private static $instance;

    private $documentRoot;

    private function __construct(){ // por ser singleton o construtor é private
        // singleton
        // ele não será criado por aqui
        //throw new Exception("This class can not be started by new Proccess, only by start function");
        
    }

    public static function start(){
        if(!ProcessServerElements::$instance){ // :: é para acessar atributo static
            ProcessServerElements::$instance = new ProcessServerElements();
        }

        return  ProcessServerElements::$instance;
    }

    public function setDocumentRoot($documentRoot){
        $this->documentRoot = $documentRoot;
    }

    public function getDocumentRoot(){
        return $this->documentRoot;
    }
}