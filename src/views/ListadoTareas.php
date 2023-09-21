<?php

namespace App\views;

class ListadoTareas
{
    function __construct(array $rows = null)
    {
        //Si no hemos recibido nada poner un link al default
        if(is_null($rows)){
            echo "No se han recibido datos para mostrar";
            echo "<p><a href='/?ruta=default'>volver</p>";
        }else {
            //Verificamos que hemos recibido contenido para poder rellenar 
            //la tabla y en caso contrario indicarlo
            if(count($rows) > 0){
                echo "<table border='1'>";
                echo "<tr><td>Título</td><td>Descripción</td><td>Fecha de Creación</td><td>Fecha de Vencimiento</td></tr>";
                foreach ($rows as $row){
                    echo "<tr><td><a href='/?ruta=detalle&params=".$row["id"]."'>" . $row["titulo"] .
                        "</a><td>" . $row["descripcion"] . "</td><td>" . $row["fecha_creacion"] . "</td><td>" . $row["fecha_vencimiento"] . "</td></tr>";
                }
                echo "</table>";
            }else{
                echo "0 results";
                echo "<p><a href='/?ruta=default'>volver</p>";
            }
        }
    }
}