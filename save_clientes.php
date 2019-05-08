<?php include('db.php') ?>

<?php

if(isset($_POST['cliente'])):
    $identificacion = $_POST['identificacion'];
    $nombre = $_POST['nombre_cli'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono_cli'];
    $direccion = $_POST['direccion_cli'];
    $pais = $_POST['pais'];
    $idioma = $_POST['idioma'];
    $moneda = $_POST['moneda'];
    $forma_pago = $_POST['pago'];
    $empresa = $_POST['empresa'];

    $query = "INSERT INTO clientes(
      identificacion,
      nombres,
      apellidos,
      telefono,
      direccion,
      pais,
      idioma,
      moneda,
      forma_pago,
      nit_empresa
    )
    VALUE(
      '$identificacion',
      '$nombre',
      '$apellido',
      '$telefono',
      '$direccion',
      '$pais',
      '$idioma',
      '$moneda',
      '$forma_pago',
      '$empresa'
    )";

    $res = mysqli_query($conn, $query);

        if(!$res):
            die("Query fail");
        endif;

        $_SESSION['message'] = "Cliente saved succesfully";
        $_SESSION['message-color'] = "success";

        header("Location: index.php");

endif;

?>
