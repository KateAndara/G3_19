<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
        header('Access-Control-Allow-Headers: token, Content-Type');
        header('Access-Control-Max-Age: 1728000');
        header('Content-Length: 0');
        header('Content-Type: text/plain');
        die();
     }
        header('Access-Control-Allow-Origin: *');  
        header('Content-Type: application/json');

        require_once("../config/conexion.php");
        require_once("../models/Escritor.php");

        $escritor = new Escritor();

        $body = json_decode(file_get_contents("php://input"), true);

        switch($_GET["opc"]){

            case "GetEscritores":
                $datos=$escritor->get_escritores();
                echo json_encode($datos);
            break;

            case "GetEscritor":
                $datos=$escritor->get_escritor($body["NUMERO_ESCRITOR"]);
                echo json_encode($datos);
            break;

            case "InsertEscritor":
                $datos=$escritor->insert_escritor($body["NUMERO_ESCRITOR"],$body["NOMBRE_ESCRITOR"],$body["APELLIDOS_ESCRITOR"],$body["FECHA_DE_NACIMIENTO"],$body["NACIONALIDAD"],$body["CANTIDAD_LIBROS_ESCRITOS"],$body["EMAIL"]);
                echo json_encode("Escritor Agregado");
            break;

            case "UpdateEscritor":
                $datos=$escritor->update_escritor($body["NUMERO_ESCRITOR"],$body["NOMBRE_ESCRITOR"],$body["APELLIDOS_ESCRITOR"],$body["FECHA_DE_NACIMIENTO"],$body["NACIONALIDAD"],$body["CANTIDAD_LIBROS_ESCRITOS"],$body["EMAIL"]);
                echo json_encode("Escritor Actualizado");
            break;

            case "DeleteEscritor":
                $datos=$escritor->delete_escritor($body["NUMERO_ESCRITOR"]);
                echo json_encode("Escritor Eliminado");
            break;
        }

?>