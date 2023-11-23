<?php

require_once '../config/conexion.php';

class Parqueo{
    public $id;
    public $tarifa;
    public $hora;
    public $fecha;
    public $salida;
    public $id_reserva;

    const TABLA = 'parqueos';
    

    public function getId(){
        return $this->id;
    }

    public function getTarifa(){
        return $this->tarifa;
    }

    public function getHora(){
        return $this->hora;
    }

    public function getFecha(){
        return $this->fecha;
    }

    public function getSalida(){
        return $this->salida;
    }

    public function getId_reserva(){
        return $this->id_reserva;
    }

    public function setTarifa($tarifa){
        return $this->tarifa = $tarifa;
    }

    public function setHora($hora){
        return $this->hora = $hora;
    } 

    public function setFecha($fecha){
        return $this->fecha = $fecha;
    }
 

    public function setSalida($salida){
        return $this->salida = $salida;
    }

    public function setId_reserva($id_reserva){
        return $this->id_reserva = $id_reserva;
    }      

    public function __construct($tarifa, $hora, $fecha, $salida, $id_reserva, $id = null){
        $this->tarifa = $tarifa;
        $this->hora = $hora;
        $this->fecha = $fecha;
        $this->salida = $salida;
        $this->id_reserva = $id_reserva;
        $this->id = $id;
    }

    public function guardar() {
        try {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (tarifa, hora, fecha, salida, id_reserva) 
            VALUES (:tarifa, :hora, :fecha, :salida, :id_reserva)');

            $consulta->bindParam(':tarifa', $this->tarifa);
            $consulta->bindParam(':hora', $this->hora);
            $consulta->bindParam(':fecha', $this->fecha);
            $consulta->bindParam(':salida', $this->salida);
            $consulta->bindParam(':id_reserva', $this->id_reserva);
            
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
        $consulta = $conexion -> prepare('SELECT id, tarifa, fecha, hora, salida, id_reserva FROM ' . self::TABLA . ' ORDER BY id');
        $consulta -> execute();
        $registros = $consulta -> fetchAll();

        return $registros;
 
    }

}