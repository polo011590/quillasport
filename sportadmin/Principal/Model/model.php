
<?php

class model {

    function GET_Nombre_usuario($cedula) {
        require_once '../../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();

        $query = "SELECT CONCAT(NOMBRES, ' ', APELLIDOS) FROM usuarios WHERE ID='" . $cedula . "'";
        $exec = mysqli_query($conex, $query) or die('Error al Obtener los datos');
        while ($datos = mysqli_fetch_array($exec)) {
            echo '<h5 style="color:#fff">Hola, ' . $datos[0] . '&nbsp;&nbsp;&nbsp;&nbsp;</h5>';
        }
        $puente->Cerrar_Conexion($conex);
    }

    function IS_Administrator($cedula) {
        require_once '../../../config.php';
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
