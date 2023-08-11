<?php 
namespace modelo;

use Conexion;

include_once "conexion.php";

class Producto {


    private $id;
    private $nombre;
    private $precio;
    private $conexion;

    

    public function __construct()
    {
        $this->conexion = new \Conexion;
    }


    public function read(){
    try {
        $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM productos");
        $sql->execute();
        $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    } catch (\PDOException $e) {
        return $e->getMessage();
    }
    }

    public function readToppins(){
        try {
            $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM toppins");
            $sql->execute();
            $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
        }


    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of precio
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     */
    public function setPrecio($precio): self
    {
        $this->precio = $precio;

        return $this;
    }
}