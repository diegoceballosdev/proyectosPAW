<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body class="container-fluid">

    <?php require_once("nav.php"); ?>

    <div class="row justify-content-md-center text-center">

        <div>
            <h2>Lista de Usuarios</h2>
        </div>

        <br><br>

        <div  class="col-12 col-md-8">
            <table class="table table-light table-striped">

                <thead>
                    <tr>
                        <?php require_once("core/constantes.php");
                        foreach (USUARIO_COLUMNS as $columna): ?>
                            <td scope="col"><?php echo $columna ?></td>
                        <?php endforeach; ?>
                        <td scope="col">Editar</td>
                        <td scope="col">Eliminar</td>
                    </tr>
                </thead>

                <tbody class="table-group-divider">

                <?php foreach ($this->consultarTodo() as $usuario): ?>

                    <tr>
                        <td><?php echo $usuario->nombre ?></td>
                        <td><?php echo $usuario->apellido ?></td>
                        <td><?php echo $usuario->telefono ?></td>
                        <td><?php echo $usuario->edad ?></td>

                        <td><a href="index.php?controlador=usuario&accion=mostrar&id=<?php echo $usuario->id ?>" class="btn btn-warning">Editar</a></td>
                        <td><a onclick="javascript:return confirm('Seguro que desea eliminar este usuario?')" href="index.php?controlador=usuario&accion=borrar&id=<?php echo $usuario->id ?>" class="btn btn-danger">Eliminar</a></td>
                    </tr>

                <?php endforeach ?>

                </tbody>
                
            </table>
        </div>

        <br>
        
        <div class="row justify-content-md-center text-center">

            <div class="col-12 col-md-4">
                <h2>Nuevo usuario</h2>
                <a href="index.php?controlador=usuario&accion=mostrar" class="form-control btn btn-success">Click aqui</a>

            </div>

        </div>
 
    </div>

    <script src=" https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>