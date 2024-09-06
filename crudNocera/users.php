<?php
    include_once('connection.php');
    include_once('header.php');
    echo "<div class='container'>";
    
    if (isset($_POST['delete'])) {
        $sql = "delete from users where user_id=".$_POST['userid'];
        if ($con->query($sql) === true) {
            echo "<div class='alert alert-success'>Usuario eliminado correctamente</div>";
        } else {
            echo "<div class='alert alert-warning'>Problemas al eliminar usuario</div>";
        }
    }
    
    
    
    $sql = "SELECT * FROM users";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {

        ?>
        <div class="row">
            <div class="col-md-12">
                <h2>Listado de Usuarios</h2>
                <table class='table table-striped table-bordered'>
                    <thead class='table-dark'>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Direccion</th>
                        <th>Contacto</th>
                        <th>Borrar</th>
                        <th>Editar</th>
                    </tr>
                    </thead>
                    <?php
                    while ($row = $result->fetch_assoc()){
                        echo "<tr>";
                        echo "<form method='POST'>";
                        echo "<input type='hidden' name='userid' value='".$row['user_id']."'>";
                        echo "<td>".$row['firstname']."</td>";
                        echo "<td>".$row['lastname']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['contact']."</td>";
                        echo "<td class='text-center align-middle'><input type='submit' name='delete' value='Borrar' class='btn btn-danger'></td>";
                        echo "<td class='text-center align-middle'><a href='edit.php?id=".$row['user_id']."' class='btn btn-info'>Editar</a></td>";
                        echo "</form>";
                        echo "</tr>";
                    }
                    ?>
                </table>

<?php

    }else{
            echo "<div class='alert alert-warning'>No se encontraron registros</div>";
    }
    echo "</div>";
?>

         </div>
      </div>

<?php
 require_once 'footer.php';
 ?>