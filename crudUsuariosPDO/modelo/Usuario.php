<?php

require_once ('core/Crud.php');

class Usuario extends Crud{

    public function __construct(
        protected int $id = 0,
        protected string $nombre = "",
        protected string $apellido = "",
        protected string $telefono = "",
        protected string $edad = ""
        ){
            parent::__construct("usuarios");
        }

    public function crearUsuario(){
        $this->crear(
            "id,nombre,apellido,telefono,edad",
            "?,?,?,?,?",
            [$this->id,$this->nombre,$this->apellido, $this->telefono, $this->edad]
        );
    }

    public function modificarUsuario(){
        $this->modificar(
            "nombre=?,apellido=?,telefono=?,edad=?",
            [$this->nombre,$this->apellido, $this->telefono, $this->edad,$this->id]);
    }

    public function eliminarUsuario(){
        $this->eliminar($this->id);
    }
}