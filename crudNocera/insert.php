<?php


require_once 'connection.php';


require_once 'header.php';


?>

<div class="container">
<?php


    if (isset($_POST['addnew'])) {


        if (empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['address']) || empty($_POST['contact'])) {

            echo "Debe completar todo los campos";
        } else {

            $firstname = $_POST['firstname'];

            $lastname = $_POST['lastname'];

            $address = $_POST['address'];

            $contact = $_POST['contact'];

            $sql = "INSERT INTO users(firstname,lastname,address,contact)
            VALUES('$firstname','$lastname','$address','$contact')";


            if ($con->query($sql) === TRUE) {

                echo "<div class='alert alert-success'>Usuario agregado correctamente</div>";
            } else {

                echo "<div class='alert alert-danger'>Error: Ocurrió un error mientras se agregaba el usuario</div>";
            }
        }
    }

    ?>

    <div class="row">

        <div class="offset-md-3 col-md-6">

            <h3><span class="fas fa-plus" style="color:#134f5c;"></span>&nbsp;Agregar Usuario</h3>

            <form action="" method="POST">

                <label for="firstname">Nombre</label>

                <input type="text" id="firstname" name="firstname" class="form-control"><br>

                <label for="lastname">Apellido</label>

                <input type="text" name="lastname" id="lastname" class="form-control"><br>

                <label for="address">Dirección</label>

                <textarea rows="4" name="address" class="form-control"></textarea><br>

                <label for="contact">Contacto</label>

                <input type="text" name="contact" id="contact" class="form-control"><br>

                <br>

                <input type="submit" name="addnew" class="offset-md-3 col-md-6 btn btn-success" value="Agregar Usuario">

            </form>

        </div>

    </div>

</div>


<?php

require_once 'footer.php';

?>