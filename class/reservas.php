<?php

require_once '../config/conexion.php';

class Reserva{
    public $id;
    public $fecha;
    public $hora;
    public $entrada;
    public $salida;
    public $id_vehiculo;
    public $id_parqueadero;

    const TABLA = 'reservas';

    public function getId(){
        return $this->id;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getHora(){
        return $this->hora;
    }

    public function getEntrada(){
        return $this->entrada;
    }

    public function getSalida(){
        return $this->salida;
    }

    public function getId_vehiculo(){
        return $this->id_vehiculo;
    }

    public function getId_parqueadero(){
        return $this->id_parqueadero;
    }

    public function setFecha($fecha){
        return $this->fecha = $fecha;
    }

    public function setHora($hora){
        return $this->hora = $hora;
    }

    public function setEntrada($entrada){
        return $this->entrada = $entrada;
    }

    public function setSalida($salida){
        return $this->salida = $salida;
    }

    public function setId_vehiculo($id_vehiculo){
        return $this->id_vehiculo = $id_vehiculo;
    }

    public function setId_parqueadero($id_parqueadero){
        return $this->id_parqueadero = $id_parqueadero;
    }      

    public function __construct($fecha, $hora, $entrada, $salida, $id_vehiculo, $id_parqueadero, $id = null){
        $this->fecha = $fecha;
        $this->hora = $hora;
        $this->entrada = $entrada;
        $this->salida = $salida;
        $this->id_vehiculo = $id_vehiculo;;
        $this->id_parqueadero = $id_parqueadero;
        $this->id = $id;
    }

    public function guardar() {
        try {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (fecha, hora, entrada, salida, id_vehiculo, id_parqueadero) 
            VALUES (:fecha, :hora, :entrada, :salida, :id_vehiculo, :id_parqueadero)');

            $consulta->bindParam(':fecha', $this->fecha);
            $consulta->bindParam(':hora', $this->hora);
            $consulta->bindParam(':entrada', $this->entrada);
            $consulta->bindParam(':salida', $this->salida);
            $consulta->bindParam(':id_vehiculo', $this->id_vehiculo);
            $consulta->bindParam(':id_parqueadero', $this->id_parqueadero);
            
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
        $consulta = $conexion -> prepare('SELECT id, fecha, hora, entrada, salida, id_vehiculo, id_parqueadero FROM ' . self::TABLA . ' ORDER BY id');
        $consulta -> execute();
        $registros = $consulta -> fetchAll();

        return $registros;
 
    }

}