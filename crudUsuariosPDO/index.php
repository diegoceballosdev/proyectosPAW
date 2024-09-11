<?php

if(!isset($_REQUEST["controlador"])){
    require_once("controlador/usuario_controlador.php");
    $controlador = new UsuarioController();
    $controlador->indexListaUsuarios();
}else{
    $controlador = $_REQUEST["controlador"];
    $accion = $_REQUEST["accion"];
    
    //Concatenamos de modo que coincida con el nombre del archivo:
    require_once("controlador/$controlador"."_controlador.php");
    
    //Convierto la 1er letra a mayuscula para concatenar:
    $controlador = ucwords($controlador)."Controller";
    
    //Tras concatenar tengo el nombre de la clase y puedo instanciar:
    $controlador = new $controlador;
    
    //Permite usar las funciones/acciones del controlador:
    call_user_func([$controlador,$accion]);
}

