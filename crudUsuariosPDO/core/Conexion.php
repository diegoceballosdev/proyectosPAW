<?php

class Conexion{

    public function __construct(
        protected string $driver = "mysql",
        protected string $host = "localhost",
        protected string $user = "root",
        protected string $pass = "",
        protected string $dbname = "sunny_side",
        protected string $charset = "utf8"
    ){}

    protected function conexion(){
        try{
            $pdo = new PDO(
                "$this->driver:host=$this->host;
                dbname=$this->dbname;
                charset=$this->charset",
                $this->user,
                $this->pass
            );
            return $pdo;
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}