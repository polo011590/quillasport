<?php

require_once '../Model/model.php';
$model = new model();
$op = $_GET["c"];
if ($op == 1) {
    $horaincomp = split(":", $_POST["hora_in"]);
    $horafincomp = split(":", $_POST["hora_fin"]);
    $cancha = $_POST["cancha"];
    $dia = $_POST["dia"];
    $horain = $horaincomp[0];
    $minin = $horaincomp[1];
    $horafin = $horafincomp[0];
    $minfin = $horafincomp[1];
    $precio = $_POST["precio"];
    $model->Registrar_Detalle_Cancha($cancha, $dia, $horain, $minin, $horafin, $minfin, $precio);
}

