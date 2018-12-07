<?php
     header("Access-Control-Allow-Origin: *");
     header("Access-Control-Allow-Headers:Origin, X-Requested-Withd, Content-Type, Accept");

  require_once '../../Models/auth/login.php';
  class LoginController{
      public static function getLoginController(){

      $data = file_get_contents("php://input");
      $request = json_decode($data);
      $request = (array) $request;
        $emailUser =$request['emailUser'];
        $passwordUser =$request['passwordUser'];

        $datosController = array('emailUser' => $emailUser,
                'passwordUser' => $passwordUser,

            );

        $respuesta = LoginModel::getLoginModel($datosController, 'user');
        echo  json_encode($respuesta) ;

      }


}



if(isset($_GET['id'])){
    if ($_GET['id'] == "getLogin") {
       $usuario = new LoginController;
       $usuario->getLoginController();
    }
 }
