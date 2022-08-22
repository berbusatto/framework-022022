<?php

namespace APP\FrameworkTools;
class ProcessServerElements{
    private static $instance;

    private $documentRoot;
    private $serverName;

    private $httpHost;
    private $uri;
    private $variables;
    private $verb;
    private $route;

    private function __construct(){ // por ser singleton o construtor é private
        // singleton
        //throw new Exception("This class can not be started by new Proccess, only by start function");
        
    }

    public static function start(){
        if(!ProcessServerElements::$instance){ // :: é para acessar atributo static
            ProcessServerElements::$instance = new ProcessServerElements();
        }

        return  ProcessServerElements::$instance;
    }

    public function setRoute($route){
        $this->route = $route;
    }

    public function getRoute(){
        return this->$route;
    }    

    public function setDocumentRoot($documentRoot){
        $this->documentRoot = $documentRoot;
    }

    public function getDocumentRoot(){
        return $this->documentRoot;
    }

    public function setServerName($serverName){
        $this->serverName = $serverName;
    }

    public function getServerName(){
        return $this->serverName;
    }

    public function getHttpHost(){
        return $this->$httpHost;
    }

    public function setHttpHost($httpHost){
        $this->httpHost = $httpHost;
    }

    public function getUri(){
        return $this->uri;
    }

    public function setUri($uri){
        $this->uri = $uri;
    }

    public function getVariables(){
        return $this->variables;
    }

    public function setVariables($variables){
        $this->variables = $variables;
    }

    public function getVerb(){
        return $this->$verb;
    }

    public function setVerb($verb){
        $this->$verb = $verb;
    }
}