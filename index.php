<?php

$mainPosition = __DIR__;


require_once("{$mainPosition}\helper\helper.php"); // helper sempre serão usados, por isso são requireds
require_once("{$mainPosition}\\vendor\autoload.php"); // é a o arquivo que guarda as configurações do use

use Bootstrap\Env; // alteramos o require_once para o use Bootstrap
use App\frameworkTools\ProcessServerElements;

Env::execute();

$processServerElements = ProcessServerElements::start(); // :: para acessar atributo/método static
dd($processServerElements);
