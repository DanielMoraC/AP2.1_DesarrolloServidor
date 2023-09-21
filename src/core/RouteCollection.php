<?php

namespace App\core;

//Esta clase se encarga de obtener las rutas predefinidas de la aplicación desde el JSON
class RouteCollection{

    private $routes;

    function __construct()
    {
        $this->routes = json_decode(file_get_contents(__DIR__."/../../config/rutas.json"), true);
    }

    /**
     * Get the value of routes
     */ 
    public function getRoutes()
    {
        return $this->routes;
    }
}