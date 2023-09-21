<?php

namespace App\core;

//Esta clase se encarga de recoger la información que pasa por la url
class Request{

    private $route;
    private $params;

    function __construct()
    {
        //Revisar que venga una ruta especifica y usarla o usar la que designemos por defecto (main)
        if(isset($_GET["ruta"])){
            $this->route = $_GET["ruta"];
            if(isset($_GET["params"])){
                //Pasamos los parametrso por el explode por si tenemos más de un paramatro
                $this->params = explode(",", $_GET["params"]);
            }else{
                $this->params = null;
            }
        }else{
            $this->route = "main";
            $this->params = null;
        }
    }

    /**
     * Get the value of route
     */ 
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Get the value of params
     */ 
    public function getParams()
    {
        return $this->params;
    }
}