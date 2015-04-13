<?php

class model {

    function Registrar_Cancha($nombre, $direccion, $correo) {
        require_once '../../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        $query = "INSERT INTO canchas VALUES(NULL,'" . $nombre . "','" . $direccion . "','" . $correo . "','A')";
        mysqli_query($conex, $query) or die('Error al Registrar la cancha');
        echo 'Cancha Registrada Satisfactoriamente!';
        $puente->Cerrar_Conexion($conex);
    }

}
