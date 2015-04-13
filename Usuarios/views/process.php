<?php

require_once '../Model/model.php';
$model = new model();
$op = $_GET["c"];
if ($op == 1) {

    $cedula = $_POST["cedula"];
    $contrasena = $_POST["contrasena"];
    $nombres = $_POST["nombres"];
    $apellidos = $_POST["apellidos"];
    $correo = $_POST["email"];
    $fecha_nac = $_POST["fecha_nac"];
    $celular = $_POST["celular"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $profesion = $_POST["Profesion"];
    $sexo = $_POST["sexo"];
    $model->Registrar_usuario($cedula, $contrasena, $nombres, $apellidos, $correo, $fecha_nac, $celular, $telefono, $direccion, $profesion, $sexo);
}

