<?php
//Incluimos un archivo que hemos generado para poder hacer autoload y usar los nombres de espacio.
include_once "../vendor/autoload.php";

//Llamamos mediante namespaces a la class que se encarga de mantener las rutas, la que mantiene la ruta del navegador
//Y la que redirige al controller correspondiente.
use App\core\{RouteCollection,Request,Dispatcher};

//Contiene las rutas de la aplicación
$route = new RouteCollection();

//Contiene la información de la url
$request = new Request();

//Envía al controller la información que necesita
$dispatcher = new Dispatcher($route, $request);