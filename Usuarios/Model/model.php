<?php

class model {

    function Registrar_usuario($cedula, $contrasena, $nombres, $apellidos, $correo, $fecha_nac, $celular, $telefono, $direccion, $profesion, $sexo) {
        require_once '../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        $query = "INSERT INTO usuarios VALUES('" . $cedula . "','" . md5($contrasena) . "','" . $nombres . "','" . $apellidos . "',"
                . "'" . $correo . "','" . $fecha_nac . "','" . $celular . "','" . $telefono . "','" . $direccion . "','" . $profesion . "',"
                . "'" . $sexo . "')";
        mysqli_query($conex, $query) or die( 'usuario ya registrado');
        echo 'Usuario Registrado Satisfactoriamente!';
        $puente->Cerrar_Conexion($conex);
    }
    
    function IS_Administrator($cedula) {
        require_once '../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        $query = "SELECT * FROM administradores WHERE CEDULA='" . $cedula . "'";
        $exec = mysqli_query($conex, $query) or die('Error en la consulta');
        if (mysqli_num_rows($exec) > 0) {
            return true;
        } else {
            return false;
        }
    }

}
