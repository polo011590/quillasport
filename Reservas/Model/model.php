<?php

class model {

     function Realizar_Reserva($usuario, $cancha, $fecha_reserva, $horain, $minin, $horafin, $minfin,$arbitro) {
        require_once '../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        if ($this->Cancha_Ocupada($cancha, $fecha_reserva, $horain, $horafin)) {
            die('Cancha Ocupada. Verifique Otro tiempo disponible!');
        } else {

            $query = "INSERT INTO reservas VALUES(NULL,'" . $usuario . "'," . $cancha . ",'" . date('Y-m-d') . "','" . $fecha_reserva . "'," . $horain . "," . $minin . "," . $horafin . "," . $minfin . "," . $arbitro . ")";
            mysqli_query($conex, $query) or die('Error al Realizar la Reserva<br>' . $query);
            echo 'Tu reserva se registro Satisfactoriamente!';
        }
    }

    function Cancha_Ocupada($cancha, $fecha, $hi, $hf) {
        require_once '../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        $query = "SELECT * FROM reservas WHERE CANCHA=" . $cancha . " AND FECHA_RESERVA='" . $fecha . "'";
        $exec = mysqli_query($conex, $query) or die('Error de consulta');
        if (mysqli_num_rows($exec) > 0) {
            while ($datos = mysqli_fetch_array($exec)) {
                $horain = $datos[5];
                $horafin = $datos[7];
                if (($hi >= $horain && $hi < $horafin) || ($hf >= $horain && $hf <= $horafin) || ($hi < $horain && $hf > $horain)) {
                    return true;
                }
            }
            return false;
        } else {
            return false;
        }
    }

    function Get_Horas() {

        for ($i = 6; $i < 23; $i++) {
            echo '<option value="' . $i . ':30">' . $i . ':30</option>';
        }
    }

    function Get_Canchas() {
        require_once '../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        $query = "SELECT * FROM canchas WHERE ESTADO='A'";
        $exec = mysqli_query($conex, $query) or die('Error al Registrar al consultar');
        while ($datos = mysqli_fetch_array($exec)) {
            echo '<option value="' . $datos[0] . '">' . $datos[1] . '</option>';
        }
        $puente->Cerrar_Conexion($conex);
    }
    
     function Get_arbitro() {
        require_once '../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        $query = "SELECT * FROM arbitros WHERE ESTADO='A'";
        $exec = mysqli_query($conex, $query) or die('Error al Registrar al consultar');
        while ($datos = mysqli_fetch_array($exec)) {
            echo '<option value="' . $datos[0] . '">' . $datos[0] . '</option>';
        }
        $puente->Cerrar_Conexion($conex);
    }
    
       
//  function Get_Usuarios() {
//        require_once '../../../config.php';
//        $puente = new config();
//        $conex = $puente->Conectar_BD();
//        $query = "SELECT ID, CONCAT( NOMBRES,  ' ', APELLIDOS ) 
//FROM usuarios";
//        $exec = mysqli_query($conex, $query) or die('Error en la consulta de usuarios.');
//        echo '<datalist id="usuarios">';
//        while ($datos = mysqli_fetch_array($exec)) {
//            echo '<option label="' . $datos[1] . '" value="' . $datos[0] . '">';
//        }
//        echo '</datalist>';
//        $puente->Cerrar_Conexion($conex);
//    }


    function Cotizar_Cancha($cancha, $fecha, $horain, $horafin  ) {
        require_once '../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();
        $query = "SELECT * FROM detalle_cancha WHERE CANCHA=" . $cancha . " AND DIA='" . date('D', strtotime($fecha)) . "'";
        $exec = mysqli_query($conex, $query) or die('Error');

        while ($datos = mysqli_fetch_array($exec)) {
            if ($horain >= $datos[3] && $horafin <= $datos[5]) {
                echo 'Valor a Pagar: ' . $datos[7];
                die();
            }
        }
        die('No existen valores en este Rango.');
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
    
      function GET_Nombre_usuario($cedula) {
        require_once '../../config.php';
        $puente = new config();
        $conex = $puente->Conectar_BD();

        $query = "SELECT CONCAT(NOMBRES, ' ', APELLIDOS) FROM usuarios WHERE ID='" . $cedula . "'";
        $exec = mysqli_query($conex, $query) or die('Error al Obtener los datos');
        while ($datos = mysqli_fetch_array($exec)) {
            echo '<h4 style="color:blue ">Hola, ' . $datos[0] . '&nbsp;&nbsp;&nbsp;&nbsp;</h4>';
        }
        $puente->Cerrar_Conexion($conex);
    }

}
