<?php

require_once '../config/conexion.php';

class Administrador{
    private $id;
    private $nombre;
    private $apellido;
    private $documento;
    private $usuario;
    protected $clave;

    const TABLA = 'administradores';

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getApellido(){
        return $this->apellido;
    }

    public function getDocumento(){
        return $this->documento;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getClave(){
        return $this->clave;
    }
    

    public function setNombre($nombre){
        return $this->nombre = $nombre;
    }

    public function setApellido($apellido){
        return $this->apellido = $apellido;
    }

    public function setDocumento($documento){
        return $this->documento = $documento;
    }

    public function setUsuario($usuario){
        return $this->usuario = $usuario;
    }

    public function setClave($clave){
        return $this->clave = $clave;
    }    

    public function __construct($nombre, $apellido, $documento, $usuario, $clave, $id = null){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->documento = $documento;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->id = ($id !== null) ? $id : $documento;
    }

    public function guardar() {
        try {
            $conexion = new Conexion();
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA .' (id, nombre, apellido, documento, usuario, clave) 
            VALUES (:id, :nombre, :apellido, :documento, :usuario, :clave)');

            $consulta->bindParam(':id', $this->id);            
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':apellido', $this->apellido);
            $consulta->bindParam(':documento', $this->documento);
            $consulta->bindParam(':usuario', $this->usuario);
            $consulta->bindParam(':clave', $this->clave); // Cambié :clave a :clave
            
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
        $consulta = $conexion -> prepare('SELECT id, nombre, apellido, documento, usuario, clave FROM ' . self::TABLA . ' ORDER BY id');
        $consulta -> execute();
        $registros = $consulta -> fetchAll();

        return $registros;
 
    }

}