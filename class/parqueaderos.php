<?php

require_once '../config/conexion.php';

class Parqueadero{
    public $id;
    public $nombre_parqueadero;
    public $ubicacion_parqueadero;
    public $cupos_parqueadero;
    public $horario_parqueadero;
    public $id_administrador;


    const TABLA = 'parqueaderos';

    public function getId(){
        return $this->id;
    }

    public function getNombre_parqueadero(){
        return $this->nombre_parqueadero;
    }

    public function getUbicacion_parqueadero(){
        return $this->ubicacion_parqueadero;
    }

    public function getCupos_parqueadero(){
        return $this->cupos_parqueadero;
    }

    public function getHorario_parqueadero(){
        return $this->horario_parqueadero;
    }
    
    public function getId_administrador(){
        return $this->id_administrador;
    }

    public function setNombre_parqueadero($nombre_parqueadero){
        return $this->nombre_parqueadero = $nombre_parqueadero;
    }

    public function setUbicacion_parqueadero($ubicacion_parqueadero){
        return $this->ubicacion_parqueadero = $ubicacion_parqueadero;
    }

    public function setCupos_parqueadero($cupos_parqueadero){
        return $this->cupos_parqueadero = $cupos_parqueadero;
    }

    public function setHorario_parqueadero($horario_parqueadero){
        return $this->horario_parqueadero = $horario_parqueadero;
    }
    
    public function setId_administrador($id_administrador){
        return $this->id_administrador = $id_administrador;
    }

    public function __construct($nombre_parqueadero, $ubicacion_parqueadero, $cupos_parqueadero, $horario_parqueadero, $id_administrador, $id = null){
        $this->nombre_parqueadero = $nombre_parqueadero;
        $this->ubicacion_parqueadero = $ubicacion_parqueadero;
        $this->cupos_parqueadero = $cupos_parqueadero;
        $this->horario_parqueadero = $horario_parqueadero;
        $this->id_administrador = $id_administrador;
        $this->id = $id;
    }

    public function guardar() {
        try {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (nombre_parqueadero, ubicacion_parqueadero, cupos_parqueadero, horario_parqueadero, id_administrador) 
            VALUES (:nombre_parqueadero, :ubicacion_parqueadero, :cupos_parqueadero, :horario_parqueadero, :id_administrador)');

            $consulta->bindParam(':nombre_parqueadero', $this->nombre_parqueadero);
            $consulta->bindParam(':ubicacion_parqueadero', $this->ubicacion_parqueadero);
            $consulta->bindParam(':cupos_parqueadero', $this->cupos_parqueadero);
            $consulta->bindParam(':horario_parqueadero', $this->horario_parqueadero);
            $consulta->bindParam(':id_administrador', $this->id_administrador);
            
            $consulta->execute();
            
            $this->id = $conexion->lastInsertId();
        } catch (PDOException $e) {
            // Manejar la excepción (por ejemplo, imprimir el mensaje de error)
            echo "Error: " . $e->getMessage();
        } finally {
            $conexion = null;
        }
    }

    public static function mostrar(){
        $conexion = new Conexion();
        $consulta = $conexion -> prepare('SELECT id, nombre_parqueadero, ubicacion_parqueadero, cupos_parqueadero, horario_parqueadero, id_administrador FROM ' . self::TABLA . ' ORDER BY id');
        $consulta -> execute();
        $registros = $consulta -> fetchAll();

        return $registros;
 
    }

}