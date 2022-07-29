<?php

    class Editorial extends Conectar{

        public function get_editoriales(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM editorial";
            $sql=$conectar ->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);            
        }

        public function get_editorial($NUMERO_EDITORIAL){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM editorial WHERE NUMERO_EDITORIAL=?";
            $sql=$conectar ->prepare($sql);
            $sql->bindvalue(1, $NUMERO_EDITORIAL);
            $sql->execute();            
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);            
        }

        public function insert_editorial($NUMERO_EDITORIAL, $NOMBRE_EDITORIAL, $DIRECCION, $PAIS, $FECHA_FUNDACION, $CANTIDAD_LIBROS_IMPRESOS, $NUMERO_TELEFONO){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO editorial(NUMERO_EDITORIAL, NOMBRE_EDITORIAL, DIRECCION, PAIS, FECHA_FUNDACION, CANTIDAD_LIBROS_IMPRESOS, NUMERO_TELEFONO)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar ->prepare($sql);
            $sql->bindValue(1, $NUMERO_EDITORIAL);
            $sql->bindValue(2, $NOMBRE_EDITORIAL);
            $sql->bindValue(3, $DIRECCION);
            $sql->bindValue(4, $PAIS);
            $sql->bindValue(5, $FECHA_FUNDACION);
            $sql->bindValue(6, $CANTIDAD_LIBROS_IMPRESOS);
            $sql->bindValue(7, $NUMERO_TELEFONO);            
            $sql->execute();            
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);            
        }

        public function update_editorial($NUMERO_EDITORIAL, $NOMBRE_EDITORIAL, $DIRECCION, $PAIS, $FECHA_FUNDACION, $CANTIDAD_LIBROS_IMPRESOS, $NUMERO_TELEFONO){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="UPDATE editorial SET NOMBRE_EDITORIAL=?, DIRECCION=?, PAIS=?, FECHA_FUNDACION=?, CANTIDAD_LIBROS_IMPRESOS=?, NUMERO_TELEFONO=? WHERE NUMERO_EDITORIAL=?;";
            $sql=$conectar ->prepare($sql);
            $sql->bindValue(1, $NOMBRE_EDITORIAL);
            $sql->bindValue(2, $DIRECCION);
            $sql->bindValue(3, $PAIS);
            $sql->bindValue(4, $FECHA_FUNDACION);
            $sql->bindValue(5, $CANTIDAD_LIBROS_IMPRESOS);
            $sql->bindValue(6, $NUMERO_TELEFONO);
            $sql->bindValue(7, $NUMERO_EDITORIAL);
            $sql->execute();            
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);            
        }

        public function delete_editorial($NUMERO_EDITORIAL){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="DELETE FROM editorial WHERE NUMERO_EDITORIAL=?";
            $sql=$conectar ->prepare($sql);
            $sql->bindvalue(1, $NUMERO_EDITORIAL);
            $sql->execute();            
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);            
        }
    }
?>