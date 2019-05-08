<?php include('db.php') ?>

<?php

if(isset($_POST['empresa'])):
    $nit = $_POST['nit'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];
    $ubicacion = $_POST['ubicacion'];


    $query = "INSERT INTO empresas(nit, nombre, telefono, direccion, ubicacion)
                VALUE ('$nit', '$nombre', '$telefono', '$direccion', '$ubicacion')";

    $res = mysqli_query($conn, $query);

        if(!$res):
            die("Query fail");
        endif;

        $_SESSION['message'] = "Empresa saved succesfully";
        $_SESSION['message-color'] = "success";

        header("Location: index.php");


endif;

?>
