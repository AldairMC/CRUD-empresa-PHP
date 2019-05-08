<?php

include('db.php');

if(isset($_GET['nit'])){
    $nit = $_GET['nit'];
    $query = "DELETE FROM empresas WHERE nit = $nit";
    $result = mysqli_query($conn, $query);

        if(!$result){
            header('Location: info.php');
        }else{
          $_SESSION['message'] = 'Empresa removed successfully';
          $_SESSION['message-color'] = 'danger';
          header("Location: index.php");
        }
}

?>
