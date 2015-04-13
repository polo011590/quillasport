<?php

class model {

    function Validar_Sesion($usuario, $contrasena) {
        require_once '../../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        $query = "SELECT * FROM usuarios WHERE ID='" . $usuario . "' AND CONTRASENA='" . md5($contrasena) . "'";
        $exec = mysqli_query($conex, $query) or die('Error al Validar la Sesion');
        if (mysqli_num_rows($exec) > 0) {
            return true;
        } else {
            return false;
        }
    }

}
