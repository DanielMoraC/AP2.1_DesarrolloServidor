<?php

namespace App\controller;

use App\Core\DataBase;
use App\Models\Tareas;
use App\Views\ListadoTareas;

class MainController{

    public function main(){
        //Conectamos a la BB.DD y creamos el modelo Tarea para acceder a los datos
        $tarea = new Tareas(new DataBase());
        //Con esto se reciben todos los datos que existen en la tabla
        new ListadoTareas($tarea->findAll());
    }

    //Con esto en caso de no tener ruta definida no salen errores
    function default(){
        echo "La ruta que buscas no existe.\n";
    }
}