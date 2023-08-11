<?php
namespace modelo;

include_once "conexion.php";

class Usuario
{

    private $correo;
    private $password;

    private $conexion;

    public function __construct()
    {
        $this->conexion = new \Conexion;
    }




    public function login()
    {
        try {
            $sql = $this->conexion->getConPDO()->prepare("SELECT * FROM usuarios WHERE  correo=? AND password=?");
            $sql->bindParam(1, $this->correo);
            $sql->bindParam(2, $this->password);
            $sql->execute();
            $result = $sql->fetchAll(\PDO::FETCH_ASSOC);
            return $result;

        } catch (\PDOException $err) {
            return "Error: " + $err->getMessage();
        }
    }





    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of correo
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set the value of correo
     */
    public function setCorreo($correo): self
    {
        $this->correo = $correo;

        return $this;
    }

}