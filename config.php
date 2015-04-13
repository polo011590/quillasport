<?php

class config {

    /* public $servidor = "mysql2.000webhost.com";
    public $bd = "a5583291_sport";
    public $user = "a5583291_sport";
    public $pass = "sport123";*/

   public $servidor = "localhost";
    public $bd = "sports";
    public $user = "root";
    public $pass = "";

    public function __construct() {

        ;
    }

    public function Conectar_BD() {


        $connection = mysqli_connect($this->servidor, $this->user, $this->pass);
        if (!$connection) {
            die("Database connection failed: " . mysqli_error());
        }

        $db_select = mysqli_select_db($connection, $this->bd);
        if (!$db_select) {
            die("Database selection failed: " . mysqli_error());
        }
        return $connection;
    }

    function Cerrar_Conexion($cad) {
        mysqli_close($cad);
    }

}
