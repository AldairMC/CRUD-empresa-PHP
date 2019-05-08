<?php

include('db.php');
$nombre = '';
$telefono= '';
$direccion = '';
$ubicacion= '';


if(isset($_GET['nit'])){
    $nit = $_GET['nit'];

    $query = "SELECT nombre, telefono, direccion, ubicacion FROM empresas WHERE nit = $nit";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
        $telefono = $row['telefono'];
        $direccion = $row['direccion'];
        $ubicacion = $row['ubicacion'];
    }
}

if(isset($_POST['update'])){
    $nit = $_GET['nit'];
    $nombre_u = $_POST['nombre'];
    $telefono_u = $_POST['telefono'];
    $direccion_u = $_POST['direccion'];
    $ubicacion_u = $_POST['ubicacion'];

    $query = "UPDATE empresas
    set nombre = '$nombre_u',
        telefono = '$telefono_u',
        direccion = '$direccion_u',
        ubicacion = '$ubicacion_u'

    WHERE nit = $nit";
    mysqli_query($conn, $query);

    $_SESSION['message'] = "Empresa Updated successfully";
    $_SESSION['message-color'] = "info";
    header("Location: index.php");


}

?>

<?php include('include/header.php')?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit_empresa.php?nit=<?php echo $_GET['nit']?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" placeholder="Update nombre"
                        class="form-control" value="<?php echo $nombre; ?>">
                    </div>
                    <div class="form-group">
                        <input type="number" name="telefono" placeholder="Update telefono"
                        class="form-control" value="<?php echo $telefono; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="direccion" placeholder="Update direccion"
                        class="form-control" value="<?php echo $direccion; ?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="ubicacion" placeholder="Update ubicacion"
                        class="form-control" value="<?php echo $ubicacion; ?>">
                    </div>

                    <button class="btn btn-success btn-block" name="update">
                    Update
                    </button>
                </form>
            </div>
        </div>
    </div>

</div>

<?php include('include/footer.php')?>
