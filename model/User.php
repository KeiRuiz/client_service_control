<?php
class User{
    private $id;
    private $nombre;
    private $email;

    public function __construct($idP,$nombreP,$emailP)
    {
        $this->id = $idP;
        $this->nombre = $nombreP;
        $this->email = $emailP;
    }

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getEmail(){
        return $this->email;
    }
    //set
    public function setId($idP){
        $this->id = $idP;
    }
    public function setNombre($nombreP){
        $this->nombre = $nombreP;
    }
    public function setEmail($emailP){
        $this->email = $emailP;
    }

    public function __toString()
    {
        return "ID: $this->id, Nombre: $this->nombre, Email: $this->email";
    }
}
?>