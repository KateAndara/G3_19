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
        require_once("../models/Editorial.php");

        $editorial = new Editorial();

        $body = json_decode(file_get_contents("php://input"), true);

        switch($_GET["opc"]){

            case "GetEditoriales":
                $datos=$editorial->get_editoriales();
                echo json_encode($datos);
            break;

            case "GetEditorial":
                $datos=$editorial->get_editorial($body["NUMERO_EDITORIAL"]);
                echo json_encode($datos);
            break;

            case "InsertEditorial":
                $datos=$editorial->insert_editorial($body["NUMERO_EDITORIAL"],$body["NOMBRE_EDITORIAL"], $body["DIRECCION"], $body["PAIS"],$body["FECHA_FUNDACION"],$body["CANTIDAD_LIBROS_IMPRESOS"],$body["NUMERO_TELEFONO"]);
                echo json_encode("Editorial agregado con éxito");
            break;

            case "UpdateEditorial":
                $datos=$editorial->update_editorial($body["NUMERO_EDITORIAL"],$body["NOMBRE_EDITORIAL"], $body["DIRECCION"], $body["PAIS"],$body["FECHA_FUNDACION"],$body["CANTIDAD_LIBROS_IMPRESOS"],$body["NUMERO_TELEFONO"]);
                echo json_encode("Editorial actualizado con éxito");
            break;

            case "DeleteEditorial":
                $datos=$editorial->delete_editorial($body["NUMERO_EDITORIAL"]);
                echo json_encode("Editorial eliminado con éxito");
            break;
        }
?>