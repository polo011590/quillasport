<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Listado de Canchas</title>
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
            $query = "select canchas.Nombre, canchas.direccion, detalle_cancha.dia, detalle_cancha.hora_in, detalle_cancha.min_in,detalle_cancha.hora_fin,detalle_cancha.min_fin, detalle_cancha.valor
		from canchas	
                inner join detalle_cancha on detalle_cancha.cancha=canchas.id";
            $exec = mysqli_query($conex, $query) or die('Error');
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Direccion</th>
                         <th>dia</th>                        
                        <th>hora inicio</th>
                        <th>minuto inicio</th>
                        <th>hora fin</th>
                        <th>minutos fin</th>
                        <th>valor</th>

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
                            <td><?php echo $datos[4]; ?></td>
                            <td><?php echo $datos[5]; ?></td>
                             <td><?php echo $datos[6]; ?></td>
                              <td><?php echo $datos[7]; ?></td>
                            

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