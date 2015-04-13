<?php

class model {

    function Validar_Sesion($usuario, $contrasena) {
        require_once '../../config.php';
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
    
    
      function GET_Nombre_usuario($cedula) {
        require_once '../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();

        $query = "SELECT CONCAT(NOMBRES, ' ', APELLIDOS) FROM usuarios WHERE ID='" . $cedula . "'";
        $exec = mysqli_query($conex, $query) or die('Error al Obtener los datos');
        while ($datos = mysqli_fetch_array($exec)) {
            echo '<h5 style="color:#fff">Hola, ' . $datos[0] . '&nbsp;&nbsp;&nbsp;&nbsp;</h5>';
        }
        $puente->Cerrar_Conexion($conex);
    }
    
    

}
