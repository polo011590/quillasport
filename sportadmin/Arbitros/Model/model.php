<?php

class model {

    function Registrar_Arbitro($cedula) {
        require_once '../../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        $query = "INSERT INTO arbitros VALUES('" . $cedula . "','A')";
        mysqli_query($conex, $query) or die('Error al Registrar el Arbitro');
        echo 'Arbitro Registrado Satisfactoriamente!';
        $puente->Cerrar_Conexion($conex);
    }

    function Get_Usuarios() {
        require_once '../../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        $query = "SELECT ID, CONCAT( NOMBRES,  ' ', APELLIDOS ) 
FROM usuarios";
        $exec = mysqli_query($conex, $query) or die('Error en la consulta de usuarios.');
        echo '<datalist id="usuarios"  style="width: 100%;">';
        while ($datos = mysqli_fetch_array($exec)) {
            echo '<option label="' . $datos[1] . '" value="' . $datos[0] . '">';
        }
        echo '</datalist>';
        $puente->Cerrar_Conexion($conex);
    }

}
