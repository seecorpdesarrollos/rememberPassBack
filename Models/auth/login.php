<?php
  require_once '../../Models/conexion.php';
   class LoginModel{
      static public function getLoginModel($datosModel,  $tabla){

          $sql = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE emailUser = :emailUser AND passwordUser = :passwordUser");
          $sql->execute( array(
            ':emailUser'=>$datosModel['emailUser'],
            ':passwordUser'=>$datosModel['passwordUser'],
            ));

          return $res =  $sql->fetch();

          /* if ($res == true) {
             return $res;
           }else{
             return 'Error';
           }*/

        $sql->close();
   	  }



}
