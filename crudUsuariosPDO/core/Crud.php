<?php

require_once("Conexion.php");

class Crud extends Conexion{

    private $pdo;

    public function __construct(
        public string $tabla
        ){
        parent::__construct();
        $this->pdo = $this->conexion();
    }

    //CONSULTAR MULTIPLES DATOS (TODOS):
    public function consultarTodo(){
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM $this->tabla");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //CONSULTAR UN DATO (ESPECIFICO):
    public function consultarUno(int $id){
        try{
            //Se usa parametrizacion '?' para evitar inyeccion SQL
            $stmt = $this->pdo->prepare("SELECT * FROM $this->tabla WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_OBJ);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //ELIMINAR UN DATO (ESPECIFICO):
    public function eliminar(int $id){
        try{
            //Se usa parametrizacion '?' para evitar inyeccion SQL
            $stmt = $this->pdo->prepare("DELETE FROM $this->tabla WHERE id = ?");
            $stmt->execute([$id]);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //CREAR:
    public function crear(string $columnas, string $marcadores, array $datos){
        $stmt = $this->pdo->prepare("INSERT INTO $this->tabla ($columnas) VALUES ($marcadores)");
        $stmt->execute($datos);
    }

    //MODIFICAR:
    public function modificar(string $columnas, array $datos){
        $stmt = $this->pdo->prepare("UPDATE $this->tabla SET $columnas WHERE id=?");
        $stmt->execute($datos);
    }

}