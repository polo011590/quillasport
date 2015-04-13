<?php

class model {

    function Registrar_Detalle_Cancha($cancha, $dia, $horain, $minin, $horafin, $minfin, $precio) {
        require_once '../../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        if ($this->validar_Detalle($cancha, $dia, $horain, $horafin)) {
            $query = "INSERT INTO detalle_cancha VALUES(NULL," . $cancha . ",'" . $dia . "'," . $horain . "," . $minin . "," . $horafin . "," . $minfin . "," . $precio . ")";
            mysqli_query($conex, $query) or die('Error al Registrar el detalle de la cancha <br>' . $query);
            echo 'Detalle de la cancha Registrado Satisfactoriamente!';
            $puente->Cerrar_Conexion($conex);
        } else {
            echo 'Error en los datos a ingresar. Asegurese que la cancha a programar tenga ese horario disponible.';
        }
    }

    function Get_Horas() {

        for ($i = 6; $i < 23; $i++) {
            echo '<option value="' . $i . ':30">' . $i . ':30</option>';
        }
    }

    function Get_Canchas() {
        require_once '../../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        $query = "SELECT * FROM canchas WHERE ESTADO='A'";
        $exec = mysqli_query($conex, $query) or die('Error al Registrar el Arbitro');
        while ($datos = mysqli_fetch_array($exec)) {
            echo '<option value="' . $datos[0] . '">' . $datos[1] . '</option>';
        }
        $puente->Cerrar_Conexion($conex);
    }

    function validar_Detalle($cancha, $dia, $horain, $horafin) {
        require_once '../../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        $query = "SELECT * FROM detalle_cancha WHERE (HORA_IN=" . $horain . " OR HORA_FIN=" . $horafin . ") AND CANCHA=" . $cancha;
        $exec = mysqli_query($conex, $query) or die('Error en la validacion SQL.');
        if (mysqli_num_rows($exec) > 0) {
            return false;
        } else {
            if ($horain > $horafin) {
                return false;
            } else {
                return true;
            }
        }
    }

}
