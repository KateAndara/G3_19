<?php

    class Escritor extends Conectar{

        public function get_escritores(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM escritor";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }



        public function get_escritor($NUMERO_ESCRITOR){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM escritor WHERE NUMERO_ESCRITOR=?";
            $sql=$conectar->prepare($sql);
            $sql->bindvalue(1, $NUMERO_ESCRITOR);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }



        public function insert_escritor($NUMERO_ESCRITOR, $NOMBRE_ESCRITOR, $APELLIDOS_ESCRITOR, $FECHA_DE_NACIMIENTO, $NACIONALIDAD, $CANTIDAD_LIBROS_ESCRITOS, $EMAIL){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO escritor(NUMERO_ESCRITOR, NOMBRE_ESCRITOR, APELLIDOS_ESCRITOR, FECHA_DE_NACIMIENTO, NACIONALIDAD, CANTIDAD_LIBROS_ESCRITOS, EMAIL)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $NUMERO_ESCRITOR);
            $sql->bindValue(2, $NOMBRE_ESCRITOR);
            $sql->bindValue(3, $APELLIDOS_ESCRITOR);
            $sql->bindValue(4, $FECHA_DE_NACIMIENTO);
            $sql->bindValue(5, $NACIONALIDAD);
            $sql->bindValue(6, $CANTIDAD_LIBROS_ESCRITOS);
            $sql->bindValue(7, $EMAIL);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }



        public function update_escritor($NUMERO_ESCRITOR, $NOMBRE_ESCRITOR, $APELLIDOS_ESCRITOR, $FECHA_DE_NACIMIENTO, $NACIONALIDAD, $CANTIDAD_LIBROS_ESCRITOS, $EMAIL){
            $conectar=parent::conexion();
            parent::set_names();
            $sql="UPDATE escritor SET NOMBRE_ESCRITOR =?, APELLIDOS_ESCRITOR =?, FECHA_DE_NACIMIENTO =?, NACIONALIDAD =?, CANTIDAD_LIBROS_ESCRITOS =?, EMAIL =? WHERE NUMERO_ESCRITOR =?;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$NOMBRE_ESCRITOR);
            $sql->bindValue(2,$APELLIDOS_ESCRITOR);
            $sql->bindValue(3,$FECHA_DE_NACIMIENTO);
            $sql->bindValue(4,$NACIONALIDAD);
            $sql->bindValue(5,$CANTIDAD_LIBROS_ESCRITOS);
            $sql->bindValue(6,$EMAIL);
            $sql->bindValue(7,$NUMERO_ESCRITOR);
            $sql->execute();
            return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
        }



        public function delete_escritor($NUMERO_ESCRITOR){
            $conectar= parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM escritor WHERE NUMERO_ESCRITOR =?";
            $sql=$conectar->prepare($sql);
            $sql->bindvalue(1, $NUMERO_ESCRITOR);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }


    }
?>