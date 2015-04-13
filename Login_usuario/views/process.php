
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

           header('Location:Home.php');
       } else {
           
          echo '<h5 style="color:#fff"> contraseña incorrecta &nbsp;&nbsp;&nbsp;&nbsp;</h5>';
              
           header('Location:Registro.php');
       }
   }

