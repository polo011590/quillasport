<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include_once '../Model/model.php';
session_start();
$model = new model();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Reserva tu Cancha</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="css/bootstrap-responsive.css">
        <link rel="stylesheet" href="css/miestilo.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
        <script type="text/javascript" src="js/Action_submit.js"></script>
        <script type="text/javascript">

            $(document).ready(function() {
                $('#btn_verify').click(function() {

                    $('#result').html('Cotizando...').fadeIn(1000);


                    var cancha = $('#cancha').val();
                    var fechares = $('#fecha_evento').val();
                    var horain = $('#hora_in').val();
                    var horasal = $('#hora_fin').val();
                    var dataString = 'cancha=' + cancha + '&fecha_evento=' + fechares + '&hora_in=' + horain + '&hora_fin=' + horasal;

                    $.ajax({
                        type: "POST",
                        url: 'process.php?c=2',
                        data: dataString,
                        success: function(data) {
                            $('#result').fadeIn(1000).html(data);

                        },
                        error: function(data) {
                            alert('Fallo en el servidor');
                        }
                    });
                });

            });
        </script>
    </head>
    
    <style type="text/css">
        
        table{
           border-bottom:2px #339900 solid;  
        }
        
        .super_cam{
            width:100px;
            height:150px; 
            
        }
        .listo{
          color:#339900;
          font-size:12px; 
            
            
        }
        
    </style>
    <body>
        
       
        <div id="capa_load">
            <div id="logo_load">

                <img src="img/loader.GIF"/>
                <p>Procesando...</p>
            </div>

        </div>
        <div style="width: 90%; margin: 0px auto; margin-top: 30px;">
            
         <table >

                <tbody>
                    <tr>
                        <td>
                            <img class="super_cam" src="img/super_cam.png"/>
                            
                        </td>
                        <td>
          
                            <?php
                            //echo $_SESSION["id"];
                            $model->GET_Nombre_usuario($_SESSION["id"]);?>
                            <h5 class="listo">listo para reservar¡¡</h5>
                        </td>
                        
                   </tr>
                   
                   
                </tbody>
            </table>
        
            
            
            
            <br>
            <a href="../../sportadmin/Canchas/views/Listado.php" class="btn-link"> Listado de Canchas</a><br>
            <a href="lista_canchas_cara.php" class="btn-link"> horarios y precios</a>
            
            
            <fieldset>
                <legend style="color: #339900;">Realizaci&oacute;n de Reserva</legend>
                <form id="formreg" action="process.php?c=1" method="post">
                    <label>Usuario:</label>
                    <input type="text" readonly="on" style="width: 100%;" value="<?php echo $_SESSION["id"]; ?>" name="usuario"/>
                    
                    
                    <label>Cancha: </label>
                    <select id="cancha" style="width: 100%;" name="cancha">
                        <?php
                        $model->Get_Canchas();
                        ?>
                    </select>
                    
                    <label>Arbitro: </label>
                    <select id="" style="width: 100%;" name="">
                        <?php
                        $model->Get_arbitro();
                        ?>
                    </select>
                   
                    
                    <label>Fecha Partido:</label>
                    <input id="fecha_evento" type="date" style="width: 100%;" name="fecha_evento"/>
                    
                    
                    <label>Hora Inicio: </label>
                    <select id="hora_in" style="width: 100%;" name="hora_in">
                        <?php
                        include_once '../Model/model.php';
                        $model->Get_Horas();
                        ?>  
                    </select>
                    <table style="width: 100%;" border="0">

                        <tbody>
                            <tr>
                                <td>
                                 <label>Hora Fin: </label>
                                 <select id="hora_fin" style="width: 100%;" name="hora_fin">
                                        <?php
                                        include_once '../Model/model.php';

                                        $model->Get_Horas();
                                        ?>  
                                    </select>   

                                </td>
                                <td>
                                    <button style="width: 100%;" type="button" id="btn_verify" class="btn btn-primary">Cotizar</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>



                    <button type="submit" style="width: 100%;" class="btn btn-success"><i class="icon-ok"> </i>&iexcl;Reserva!</button>

                </form>
            </fieldset>
            <div id="result"></div>
            <br>
            <button class="btn btn-success" onclick="javascript:history.go(-1);">Atr&aacute;s</button>
        </div>

    </body>
</html>
