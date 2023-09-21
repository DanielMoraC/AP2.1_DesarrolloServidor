<?php

namespace App\models;

use App\core\DataBase;

class Tareas
{
    private DataBase $ddbb;

    function __construct(DataBase $ddbb)
    {
        $this->ddbb = $ddbb;
    }

    //Función para sacar todas las tareas
    public function findAll(){
        $stmt = "SELECT * FROM tareas";
        return $this->ddbb->executeStmt($stmt);
    }

    //Función para sacar el contenido de las tareas por ID
    public function findById($id){
        $stmt = "SELECT * FROM tareas WHERE id=$id";
        $result = $this->ddbb->executeStmt($stmt);
        return array_shift($result);
    }
}