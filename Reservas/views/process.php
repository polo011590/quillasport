<?php
require_once '../Model/model.php';
$model = new model();
$op = $_GET["c"];
if ($op == 1) {
    $horaincomp = split(":", $_POST["hora_in"]);
    $horafincomp = split(":", $_POST["hora_fin"]);
    $usuario = $_POST["usuario"];
    $cancha = $_POST["cancha"];
    $arbitro = $_POST["arbitro"];
    $fecha_reserva = $_POST["fecha_evento"];
    $horain = $horaincomp[0];
    $minin = $horaincomp[1];
    $horafin = $horafincomp[0];
    $minfin = $horafincomp[1];
    $model->Realizar_Reserva($usuario, $cancha, $fecha_reserva, $horain, $minin, $horafin, $minfin,$arbitro);
} else if ($op == 2) {
    $horaincomp = split(":", $_POST["hora_in"]);
    $horafincomp = split(":", $_POST["hora_fin"]);
    $cancha = $_POST["cancha"];
    $fecha_reserva = $_POST["fecha_evento"];
    $horain = $horaincomp[0];
    $horafin = $horafincomp[0];
    $model->Cotizar_Cancha($cancha, $fecha_reserva, $horain, $horafin);
}


