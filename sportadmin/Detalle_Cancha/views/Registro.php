<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once '../Model/model.php';
$model = new model();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Detalle de Canchas</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/miestilo.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/Action_submit.js"></script>
    </head>
    <body>
        <div id="capa_load">
            <div id="logo_load">

                <img src="img/loader.GIF"/>
                <p>Procesando...</p>
            </div>

        </div>
        <div style="width: 90%; margin: 0px auto; margin-top: 30px;">
            <fieldset>
                <legend style="color: #339900;">Detalle de Canchas</legend>
                <form id="formreg" action="process.php?c=1" method="post">

                    <label>Cancha: </label><select style="width: 100%;" name="cancha">
                        <?php
                        $model->Get_Canchas();
                        ?>
                    </select>
                    <label>D&iacute;a: </label><select style="width: 100%;" name="dia">
                        <option value="Mon">Lunes</option>
                        <option value="Tue">Martes</option>
                        <option value="Wed">Mi&eacute;rcoles</option>
                        <option value="Thu">Jueves</option>
                        <option value="Fri">Viernes</option>
                        <option value="Sat">S&aacute;bado</option>
                        <option value="Sun">Domingo</option>
                    </select>
                    
                    <label style="color:red "> Establecer Rango</label>
                    
                    
                    <label>Hora Inicio: </label>
                    <select style="width: 100%;" name="hora_in">
                        <?php
                        include_once '../Model/model.php';

                        $model->Get_Horas();
                        ?>  
                    </select>
                    
                    
                    <label>Hora Fin: </label>
                    <select style="width: 100%;" name="hora_fin">
                        <?php
                        include_once '../Model/model.php';

                        $model->Get_Horas();
                        ?>  
                    </select>
                    
                    <label>Precio:</label>
                    <input type="number" style="width: 100%;" name="precio"/>
                    <button type="submit" style="width: 100%;" class="btn btn-success"><i class="icon-ok"> </i> Registrar</button>

                </form>
            </fieldset>
            <div id="result"></div>
            <button class="btn btn-success" onclick="javascript:history.go(-1);">Atr&aacute;s</button>
        </div>

    </body>
</html>
