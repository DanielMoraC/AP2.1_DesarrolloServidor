<?php

namespace App\core;

use App\core\{Request, RouteCollection};

//Esta clase funciona de forma que recoge desde el Request la url e
//invoca el controller correcto para mostrar la información solicitada
class Dispatcher{

    //Almacenamos la lista de rutas desde el json
    private $routeList; 

    //Almacenamos la ruta de la url y los parametros
    private $route;
    private $params;

    //También se puede hacer guardando la class entera
    //private Request $currentRequest;

    function __construct(RouteCollection $routeCollection, Request $request)
    {
        $this->routeList = $routeCollection->getRoutes();
        $this->route = $request->getRoute();
        $this->params = $request->getParams();
        $this->dispatch();
    }

    //Usamos el controlador adecuado (main/detalle) y 
    //los parámetros adecuados en caso de ser necesario
    private function dispatch(){
        //Verificamos que hemos recibido la ruta que tenemos en la lista
        //Siempre la tendremos porque por defecto es main pero puede estar erronea
        if (isset($this->routeList[$this->route])) {
            //Sacamos el nombre del controller que queremos desde el JSON guardado en routeList
            $tipoContoller = "App\\controller\\".$this->routeList[$this->route]["controller"];
            //Creamos el controller que necesitamos
            $controller = new $tipoContoller;
            //Sacamos el nombre del action que queremos desde el JSON guardado en routeList
            $action = $this->routeList[$this->route]["action"];
            //Revisamos si se han detalles para saber si va a main o a detail controller
            if (!is_null($this->params)) {
                //Con esto pasamos todo lo que tenga esta variable, ya sea uno o varios parametros
                $controller->$action($this->params);
            }else{
                //Esto sería equivalente al MainController->main()
                $controller->$action();
            }
        }else{
            echo "No es una ruta definida";
        }
    }
}