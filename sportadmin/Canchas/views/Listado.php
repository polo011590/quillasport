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
            require_once '../../../config.php';
            $puente = new config();
            $conex = $puente->Conectar_BD();
            $query = "SELECT * FROM canchas";
            $exec = mysqli_query($conex, $query) or die('Error');
            ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>N*</th>
                        <th>Nombre</th>
                        <th>Direccion</th>
                        <th>Correo</th>

                    </tr>
                </thead>
                <tbody>

                    <?php
                    $n=0;
                    while ($datos = mysqli_fetch_array($exec)) {
                        $n=$n+1;
                        ?>

                        <tr>
                            <td><?php echo $n; ?></td>
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