<?php

namespace App\controller;

use App\core\DataBase;
use App\models\Tareas;
use App\views\DetalleTareas;

//Controlador para la vista detalle
class DetalleController
{
    public function detail(array|string $id = null)
    {
        //Si no recibimos datos por id lo enviamos tal cual para que se indique
        if(is_null($id)){
            $data = null;
        }else{
            //Creamos conexión con la base de datos y sacamos la información
            $tareas = new Tareas(new DataBase());
            //Sacamos la información de las tareas que vienen por params
            $data = [];
            foreach ($id as $rows) {
                array_push($data, $tareas->findById($rows));
            }
        }
        $view = new DetalleTareas($data);
    }
}
