<?php

namespace App\views;

//Devuelve los datos del detalle de las tareas
class DetalleTareas
{
    public function __construct(array $rows = null)
    {
        if (is_null($rows)) {
            //No hemos recibido nada por lo que debemos indicarlo.
            echo "No se han recibido datos para mostrar en la vista del Listado";
            echo "<p><a href='/?ruta=default'>volver</p>";
        } else {
            //Verificamos que tiene contenido para rellenar la tabla
            if (count($rows) > 0) {
                echo "<table border='1'>";
                echo "<tr><td>Id</td><td>Título</td><td>Descripción</td><td>Fecha de Creación</td><td>Fecha de Vencimiento</td></tr>";
                //var_dump($rows);
                foreach ($rows as $row){
                    echo "<tr><td>" . $row["id"] .
                    "<td>" . $row["titulo"] . "<td>" . $row["descripcion"] .
                    "<td>" . $row["fecha_creacion"] .
                    "<td>" . $row["fecha_vencimiento"];
                }
                echo "</table>";
                echo "<a href='/?ruta=main'>volver";
            } else {
                echo "0 results";
                echo "<p><a href='/?ruta=main'>volver</p>";
            }
        }
    }
}
