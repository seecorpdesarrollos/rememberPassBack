<?php

class Conexion{

  static public  function conectar(){

			try {
				$conexion = new PDO('mysql:host=localhost;dbname=control_pass','root','');
				$conexion->exec('SET CHARACTER SET utf8');
				$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
		//	echo "Conecyados perfectamente";
			} catch (Exception $e) {
				echo "ERROR DE CONEXION". $e->getMessage. $e->getLine;
			}

}

}

?>
