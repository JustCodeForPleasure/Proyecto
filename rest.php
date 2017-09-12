<?php 
	
	//1.- Realizamos la conexión a la base de datos en phpmyadmin (MYSQL)
	//(Nombre de la bd: rest_proyecto)
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=rest_proyecto', 'root', '');
		echo "Conexion Exitosa <br />";
	} catch (PDOException $e) {
		echo "ERROR" . $e->getMessage();
		die();
	}

	//2.-Variable para saber que se está realizando una petición HTTP con REST.
	$peticion = $_SERVER['REQUEST_METHOD'];
	
	//3.-Variables para guardar los datos enviados desde el Arduino.
	$temperatura = '';
	$humedad = '';

	//Condicionales para las peticiones.
	//Si es un GET
	if($peticion == 'GET'){
		//PENDIENTE -- OBTENER DATOS DE LA BASE DE DATOS Y MANDARSELOS AL ARDUINO
		if(isset($_GET['filename'])){
			$file_content = file_get_contents($_GET['filename']);
			echo $file_content;
		}else{
			die("ERROR: LOS PARAMETROS REQUERIDOS NO SE OTORGARON!");
		}
	//Si es un POST
	}elseif($peticion == 'POST'){
		//Hacemos algo con POST
		if(isset($_POST['temperatura']) and isset($_POST['humedad'])){
			$temperatura = $_POST['temperatura'];
			$humedad = $_POST['humedad'];

			$sentencia = $conexion->prepare("INSERT INTO temphum (temperatura, humedad) VALUES(:temperatura, :humedad)");
			$sentencia->bindParam(':temperatura', $temperatura);
			$sentencia->bindParam(':humedad', $humedad);

			//Verificamos que se inserten los datos!!
			if(!$sentencia){
				echo "Error al crear el registro";
			}else{
				$sentencia->execute();
				echo "Registro creado correctamente";
			}
		}else{
			die("ERROR: LOS PARAMETROS SON REQUERIDOS");
		}
	//No me funciona aún el DELETE está en veremos!!
	}elseif($peticion == 'DELETE'){
		parse_str(file_get_contents('php://input'), $_DELETE);

		if(isset($_DELETE['file'])){
			unlink($_DELETE['file']);
		}else{
			die("ERROR: LOS PARAMETROS SON REQUERIDOS");
		}
	}
 ?>