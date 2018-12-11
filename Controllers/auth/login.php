<?php

  require '../../headers.php';
  use \Firebase\JWT\JWT;
  require_once '../../php-jwt/src/JWT.php';
  require_once '../../php-jwt/src/SignatureInvalidException.php';
  require_once '../../php-jwt/src/BeforeValidException.php';
  require_once '../../php-jwt/src/ExpiredException.php';

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


        if($respuesta !== 'Error'){


          $time = time();
          $key = 'my_secret_key';

          $token = array(
              'iat' => $time, // Tiempo que inició el token
              'exp' => $time + (60*60), // Tiempo que expirará el token (+1 hora)
              'data' => $respuesta
          );

          $jwt = JWT::encode($token, $key);
          $data = JWT::decode($jwt, $key, array('HS256'));
          $response = array_merge((array)$respuesta,(array)$jwt);
                session_start();
                $_SESSION['key']= $jwt;
            echo  json_encode($response );

        }else{
            echo 'false';
        }


      }




}
if(isset($_GET['id'])){
    if ($_GET['id'] == "getLogin") {
       $usuario = new LoginController;
       $usuario->getLoginController();
    }



 }
