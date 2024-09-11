<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container-fluid">

    <?php require_once("nav.php"); ?>

    <main>
        <h1 class="text-center">Formulario de Usuario</h1>

        <div class="row">
        
            <div class="col-12 col-md-4 mx-auto">

                <form action="index.php?controlador=usuario&accion=guardar" method="post">

                    <input type="hidden" id="id" name="id" value="<?php echo $usuario->id ?>">

                    <div>
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input class="form-control" type="text" id="nombre" name="nombre" required
                            value="<?php echo isset($usuario->nombre) ? $usuario->nombre : ''; ?>"><br><br>
                    </div>

                    <div>
                        <label for="apellido" class="form-label">Apellido:</label>
                        <input class="form-control" type="text" id="apellido" name="apellido" required
                            value="<?php echo isset($usuario->apellido) ? $usuario->apellido : ''; ?>"><br><br>
                    </div>

                    <div>
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input class="form-control" type="tel" id="telefono" name="telefono" required
                            value="<?php echo isset($usuario->telefono) ? $usuario->telefono : ''; ?>"><br><br>
                    </div>
                    <div>
                        <label for="edad" class="form-label">Edad:</label>
                        <input class="form-control" type="number" id="edad" name="edad" min="0" required
                            value="<?php echo isset($usuario->edad) ? $usuario->edad : ""; ?>"><br><br>
                    </div>
                    <div>
                        <input class="form-control btn btn-success" type="submit" name="guardar" value="Guardar">
                    </div>

                </form>
            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>

</body>

</html>