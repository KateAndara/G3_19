<?php
    
    class Alquiler extends Conectar{

        public function get_alquileres(){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM alquiler";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function get_alquiler($CODIGO_DE_LIBRO){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM alquiler WHERE CODIGO_DE_LIBRO=?";
            $sql=$conectar->prepare($sql);
            $sql->bindvalue(1, $CODIGO_DE_LIBRO);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        public function insert_alquiler($CODIGO_DE_LIBRO, $NOMBRE_LIBRO, $FECHA_DE_ALQUILER, $NOMBRE_DEL_CLIENTE,$DIRECCION,$DIAS_A_ALQUILAR,$PRECIO_POR_ALQUILER){
            $conectar= parent::conexion();
            parent::set_names();
            $sql="INSERT INTO alquiler(CODIGO_DE_LIBRO, NOMBRE_LIBRO, FECHA_DE_ALQUILER, NOMBRE_DEL_CLIENTE,DIRECCION,DIAS_A_ALQUILAR,PRECIO_POR_ALQUILER)
            VALUES (?,?,?,?,?,?,?);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $CODIGO_DE_LIBRO);
            $sql->bindValue(2, $NOMBRE_LIBRO);
            $sql->bindValue(3, $FECHA_DE_ALQUILER);
            $sql->bindValue(4, $NOMBRE_DEL_CLIENTE);
            $sql->bindValue(5, $DIRECCION);
            $sql->bindValue(6, $DIAS_A_ALQUILAR);
            $sql->bindValue(7, $PRECIO_POR_ALQUILER);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }

        

        public function update_alquiler($CODIGO_DE_LIBRO, $NOMBRE_LIBRO, $FECHA_DE_ALQUILER, $NOMBRE_DEL_CLIENTE,$DIRECCION,$DIAS_A_ALQUILAR,$PRECIO_POR_ALQUILER){
            $conectar= parent::conexion();
            parent::set_names();
            $sql = [
                ':codigo_de_libro' => $CODIGO_DE_LIBRO,
                ':nombre_libro' => $NOMBRE_LIBRO,
                ':fecha_de_alquiler' => $FECHA_DE_ALQUILER,
                ':nombre_del_cliente' => $NOMBRE_DEL_CLIENTE,
                ':direccion' => $DIRECCION,
                ':dias_a_alquilar' => $DIAS_A_ALQUILAR,
                ':precio_por_alquiler' => $PRECIO_POR_ALQUILER];

            $sqll = "UPDATE alquiler SET NOMBRE_LIBRO=:nombre_libro, 
                                        FECHA_DE_ALQUILER=:fecha_de_alquiler,
                                        NOMBRE_DEL_CLIENTE=:nombre_del_cliente,
                                        DIRECCION=:direccion,
                                        DIAS_A_ALQUILAR=:dias_a_alquilar,
                                        PRECIO_POR_ALQUILER=:precio_por_alquiler
                                    WHERE CODIGO_DE_LIBRO = :codigo_de_libro";
            
            $sqlll=$conectar->prepare($sqll);

            return $sqlll->execute($sql);
        }

        public function delete_alquiler($CODIGO_DE_LIBRO){
            $conectar= parent::conexion();
            parent::set_names();
            $sql = "DELETE FROM alquiler WHERE CODIGO_DE_LIBRO =?";
            $sql=$conectar->prepare($sql);
            $sql->bindvalue(1, $CODIGO_DE_LIBRO);
            $sql->execute();
            return $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
        }
    }
?>