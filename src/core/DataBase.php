<?php

namespace App\Core;

class DataBase{

    //Recibe en un array los datos del JSON para conectar a una base de datos
    private $dbConfig;
    //Contiene la conexión a la base de datos
    private $conn;

    function __construct()
    {
        $this->dbConfig = json_decode(file_get_contents(__DIR__."/../../config/dbConfig.json"), true);
        $this->connect();
    }

    //Conectar con la base de datos
    private function connect(){
        $servername = $this->dbConfig["server"];
        $username = $this->dbConfig["user"];
        $password = $this->dbConfig["password"];
        $dbName = $this->dbConfig["dbname"];

        //Creamos conexión, este caso MySQL
        $this->conn = new \mysqli($servername,$username,$password,$dbName);
    }

    //Ejecutar cualquier sentencia de SQL que venga
    public function executeStmt($stmt){
        return $this->conn->query($stmt)->fetch_all(MYSQLI_ASSOC);
    }

    //Cerrar la conexión con la base de datos
    public function __destruct()
    {
        if($this->conn != null) $this->conn->close();
    }
}