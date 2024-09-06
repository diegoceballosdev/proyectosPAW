<?php

require_once 'connection.php';

require_once 'header.php';

?>
<div class="container">
    <?php
   
    if(isset($_POST['update'])){

        if( empty($_POST['firstname']) || empty($_POST['lastname']) ||
            empty($_POST['address']) || empty($_POST['contact']) )
        {
            echo "<div class='alert alert-warning'>Por favor, llene todos los campos.</div>";
        }else{        
            $firstname  = $_POST['firstname'];
            $lastname     = $_POST['lastname'];
            $address     = $_POST['address'];
            $contact      = $_POST['contact'];
            $sql = "UPDATE users SET firstname='{$firstname}', lastname = '{$lastname}',
                        address = '{$address}', contact = '{$contact}'
                        WHERE user_id=" . $_POST['userid'];

            if( $con->query($sql) === TRUE){
                echo "<div class='alert alert-success'>Usuario actualizado correctamente</div>";
            }else{
                echo "<div class='alert alert-danger'>Ocurrió un error mientras se actualizaba el usuario</div>";
            }
        }
    }
    $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;
    $sql = "SELECT * FROM users WHERE user_id={$id}";
    $result = $con->query($sql);

    if($result->num_rows < 1){
        header('Location: index.php');
        exit;
    }
    $row = $result->fetch_assoc();
    ?>
    <div class="row">
    <div class="offset-md-3 col-md-6">
        <h3><span class="fas fa-edit " style="color:#134f5c;"></span>&nbsp;Modificar Usuario</h3>
        <form action="" method="POST">
            <input type="hidden" value="<?php echo $row['user_id']; ?>" name="userid">
            <label for="firstname">Nombre</label>
            <input type="text" id="firstname"  name="firstname" value="<?php echo $row['firstname']; ?>" class="form-control"><br>
            <label for="lastname">Apellido</label>
            <input type="text"  name="lastname" id="lastname" value="<?php echo $row['lastname']; ?>" class="form-control"><br>
            <label for="address">Dirección</label>
            <textarea rows="4" name="address" class="form-control"><?php echo $row['address']; ?></textarea><br>
            <label for="contact">Contacto</label>
            <input type="text"  name="contact" id="contact"  value="<?php echo $row['contact']; ?>" class="form-control"><br>
            <br>
            <input type="submit" name="update" class="btn btn-success offset-md-3 col-md-6" value="Actualizar">
        </form>
    </div>
</div>
</div>

<?php

 require_once 'footer.php';

 ?>