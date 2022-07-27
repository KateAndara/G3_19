<?php
    if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
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
        require_once("../models/Alquiler.php");

        $alquiler = new Alquiler();

        $body = json_decode(file_get_contents("php://input"), true);

        switch($_GET["opc"]){

            case "GetAlquileres":
                $datos=$alquiler->get_alquileres();
                echo json_encode($datos);
            break;

            case "GetAlquiler":
                $datos=$alquiler->get_alquiler($body["CODIGO_DE_LIBRO"]);
                echo json_encode($datos);
            break;

            case "InsertAlquiler":
                $datos=$alquiler->insert_alquiler($body["CODIGO_DE_LIBRO"],$body["NOMBRE_LIBRO"],$body["FECHA_DE_ALQUILER"],$body["NOMBRE_DEL_CLIENTE"],$body["DIRECCION"],$body["DIAS_A_ALQUILAR"],$body["PRECIO_POR_ALQUILER"]);
                echo json_encode("Alquiler Agregado");
            break;

            case "UpdateAlquiler":
                $datos=$alquiler->update_alquiler($body["CODIGO_DE_LIBRO"],$body["NOMBRE_LIBRO"],$body["FECHA_DE_ALQUILER"],$body["NOMBRE_DEL_CLIENTE"],$body["DIRECCION"],$body["DIAS_A_ALQUILAR"],$body["PRECIO_POR_ALQUILER"]);
                echo json_encode("Alquiler Actualizado");
            break;

            case "DeleteAlquiler":
                $datos=$alquiler->delete_alquiler($body["CODIGO_DE_LIBRO"]);
                echo json_encode("Alquiler Eliminado");
            break;
        }

?>   
