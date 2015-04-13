
   <?php

   require_once '../Model/model.php';
   $model = new model();
   $op = $_GET["c"];
   session_start();
   if ($op == 1) {

       $usuario = $_POST["usuario"];
       $password = $_POST["password"];
       if ($model->Validar_Sesion($usuario, $password)) {
           $_SESSION["id"] = $usuario;

           header('Location:../../Principal/views/Home.php');
       } else {
           header('Location:Registro.php');
       }
   }

