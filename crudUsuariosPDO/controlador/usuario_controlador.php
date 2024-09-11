<?php

require_once("modelo/Usuario.php");
class UsuarioController extends Usuario{

    public function __construct(){
        parent::__construct();
    }

    public function indexListaUsuarios(){
        require_once("vista/listaUsuarios.php");
    }

    public function mostrar(){
        if(isset($_REQUEST["id"])){
            $usuario = $this->consultarUno($_REQUEST["id"]);
        }else{
            $usuario = $this;
        }
        require_once("vista/usuarioForm.php");
    }

    public function guardar() {
        // Asignar las variables de REQUEST a las propiedades de la clase
        $usuario = new Usuario();
        $usuario->id = isset($_REQUEST["id"]) ? $_REQUEST["id"] : 0;
        $usuario->nombre = $_REQUEST["nombre"];
        $usuario->apellido = $_REQUEST["apellido"];
        $usuario->telefono = $_REQUEST["telefono"];
        $usuario->edad = $_REQUEST["edad"];
        
        // Comprobar si se va a modificar o crear
        if ($usuario->id == 0) {
            // Modificar usuario existente
            $usuario->crearUsuario();
        } else {
            // Crear nuevo usuario
            $usuario->modificarUsuario();
        }
    
        // Redirigir al index
        header("Location:index.php");
    }
    

    public function borrar(){
        $this->eliminar($_REQUEST["id"]);

        header("Location:index.php");
    }
}