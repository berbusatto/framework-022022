<?php

$mainPosition = __DIR__;


require_once("{$mainPosition}\helper\helper.php"); // helper sempre serão usados, por isso são requireds
require_once("{$mainPosition}\\vendor\autoload.php"); // é a o arquivo que guarda as configurações dos use

use Bootstrap\Env; // alteramos o require_once para o use Bootstrap
use App\FrameworkTools\ProcessServerElements;
use App\FrameworkTools\Implementations\FactoryMethods\FactoryProcessServerElement;
use App\FrameworkTools\Implementations\route\RouteProcess;

Env::execute();

$factoryProcessServerElement = new FactoryProcessServerElement();
$factoryProcessServerElement->operation();

RouteProcess::execute();
