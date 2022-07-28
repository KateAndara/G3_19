<?php

    class Libro extends Conectar{

        public function get_libros(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM libro";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function get_libro($CODIGO_DE_LIBRO){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM libro WHERE CODIGO_DE_LIBRO=?";
            $sql=$conectar->prepare($sql);
            $sql->bindvalue(1, $CODIGO_DE_LIBRO);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function insert_libro($CODIGO_DE_LIBRO, $NOMBRE_LIBRO, $NOMBRE_ESCRITOR, $FECHA_PUBLICACION, $ISBN, $PRECIO, $EDITORIAL){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO libro(CODIGO_DE_LIBRO, NOMBRE_LIBRO, NOMBRE_ESCRITOR, FECHA_PUBLICACION, ISBN, PRECIO, EDITORIAL)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $CODIGO_DE_LIBRO);
            $sql->bindValue(2, $NOMBRE_LIBRO);
            $sql->bindValue(3, $NOMBRE_ESCRITOR);
            $sql->bindValue(4, $FECHA_PUBLICACION);
            $sql->bindValue(5, $ISBN);
            $sql->bindValue(6, $PRECIO);
            $sql->bindValue(7, $EDITORIAL);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function update_libro($CODIGO_DE_LIBRO, $NOMBRE_LIBRO, $NOMBRE_ESCRITOR, $FECHA_PUBLICACION, $ISBN, $PRECIO, $EDITORIAL){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE libro SET NOMBRE_LIBRO =?, NOMBRE_ESCRITOR =?, FECHA_PUBLICACION =?, ISBN =?, PRECIO =?, EDITORIAL =? WHERE CODIGO_DE_LIBRO =?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NOMBRE_LIBRO);
            $sql->bindValue(2, $NOMBRE_ESCRITOR);
            $sql->bindValue(3, $FECHA_PUBLICACION);
            $sql->bindValue(4, $ISBN);
            $sql->bindValue(5, $PRECIO);
            $sql->bindValue(6, $EDITORIAL);
            $sql->bindValue(7, $CODIGO_DE_LIBRO);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }

        public function delete_libro($CODIGO_DE_LIBRO){
            $conectar= parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM libro WHERE CODIGO_DE_LIBRO =?";
            $sql=$conectar->prepare($sql);
            $sql->bindvalue(1, $CODIGO_DE_LIBRO);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }
    }
?>    