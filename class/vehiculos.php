<?php

require_once '../config/conexion.php';

class Vehiculo{
    private $id;
    protected $placa;
    public $marca;
    public $modelo;
    public $altura;
    public $ancho;
    public $id_cliente;
    public $id_tipoVehiculo;


    const TABLA = 'vehiculos';

    public function getId(){
        return $this->id;
    }

    public function getPlaca(){
        return $this->placa;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function getAltura(){
        return $this->altura;
    }

    public function getAncho(){
        return $this->ancho;
    }

    public function getId_cliente(){
        return $this->id_cliente; 
    }

    public function getId_tipoVehiculo(){
        return $this->id_tipoVehiculo; 
    }

    public function setPlaca($placa){
        return $this->placa = $placa;

    }

    public function setMarca($marca){
        return $this->marca = $marca;
    }

    public function setModelo($modelo){
        return $this->modelo = $modelo;
    }

    public function setAltura($altura){
        return $this->altura = $altura;
    }

    public function setAcho($ancho){
        return $this->ancho = $ancho;
    }

    public function setId_cliente($id_cliente){
        return $this->id_cliente = $id_cliente;
    }
    
    public function setId_tipoVehiculo($id_tipoVehiculo){
        return $this->id_tipoVehiculo = $id_tipoVehiculo;
    }
    
    //Constructor

    public function __construct($placa, $marca, $modelo, $altura, $ancho, $id_cliente, $id_tipoVehiculo, $id=null){
        $this->placa = $placa;
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->altura = $altura;
        $this->ancho = $ancho;
        $this->id_cliente = $id_cliente;
        $this->id_tipoVehiculo = $id_tipoVehiculo;
        $this->id = $id;
    }

    public function guardar() {
        try {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (placa, marca, modelo, altura, ancho, id_cliente, id_tipoVehiculo) 
            VALUES (:placa, :marca, :modelo, :altura, :ancho, :id_cliente, :id_tipoVehiculo)');
            
            $consulta->bindParam(':placa', $this->placa);
            $consulta->bindParam(':marca', $this->marca);
            $consulta->bindParam(':modelo', $this->modelo);
            $consulta->bindParam(':altura', $this->altura);
            $consulta->bindParam(':ancho', $this->ancho);
            $consulta->bindParam(':id_cliente', $this->id_cliente);
            $consulta->bindParam(':id_tipoVehiculo', $this->id_tipoVehiculo);                 
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
        $consulta = $conexion -> prepare('SELECT id, placa, marca, modelo, altura, ancho, id_cliente, id_tipoVehiculo FROM ' . self::TABLA . ' ORDER BY id');
        $consulta -> execute();
        $registros = $consulta -> fetchAll();

        return $registros;
 
    }

}