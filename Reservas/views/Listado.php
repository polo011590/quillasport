<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado de Reservas</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
    </head>
    <body>
        <div style="width: 90%; margin: 0px auto; margin-top: 30px;">
            <?php
            require_once '../../config.php';
            $puente = new config();
            $conex = $puente->Conectar_BD();
            $query = "SELECT CONCAT( U.NOMBRES,  ' ', U.APELLIDOS ) , C.NOMBRE, R.FECHA_RESERVA, CONCAT( R.HORA_IN,  ':', R.MIN_IN,  ' - ', R.HORA_FIN,  ':', R.MIN_FIN ) 
FROM reservas R
INNER JOIN usuarios U ON U.ID = R.USUARIOS
INNER JOIN canchas C ON C.ID = R.CANCHA";
            $exec = mysqli_query($conex, $query) or die('Error');
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Cliente</th>
                        <th>Cancha</th>
                        <th>Fecha Reserva</th>
                        <th>Hora</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    while ($datos = mysqli_fetch_array($exec)) {
                        ?>

                        <tr>
                            <td><?php echo $datos[0]; ?></td>
                            <td><?php echo $datos[1]; ?></td>
                            <td><?php echo $datos[2]; ?></td>
                            <td><?php echo $datos[3]; ?></td>

                        </tr>



                        <?php
                    }
                    ?>
                </tbody>
            </table>
            <button class="btn btn-success" onclick="javascript:history.go(-1);">Atr&aacute;s</button>
        </div>

    </body>
</html>