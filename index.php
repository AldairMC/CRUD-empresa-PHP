<?php include('db.php') ?>

<?php include('include/header.php')?>

<div class="container-fluid p-4">

    <div class="row">
        <div class="col-md-4">
          <?php
           if(isset($_SESSION['message'])) : ?>
              <div class="alert alert-<?= $_SESSION['message-color']?> alert-dismissible fade show" role="alert">
              <?= $_SESSION['message']?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          <?php session_unset();
          endif; ?>
          <h3 class="text-center"><a href="agregar_clientes.php">Agreagr Clientes</a></h3><br>
            <div class="card card-body">
            <h3 class="text-center">Empresas</h3><br>
                <form action="save_empresa.php" method="POST" >
                    <div class="form-group">
                        <input type="number" id="nit" name="nit" class="form-control"
                        placeholder="NIT" autofocus required />
                    </div>
                    <div class="form-group">
                        <input type="text" id="name" name="nombre"
                        class="form-control" placeholder="Nombre"
                        required />
                    </div>
                    <div class="form-group">
                        <input type="number" id="telefono" name="telefono"
                        class="form-control" placeholder="Télefono"
                        required />
                    </div>
                    <div class="form-group">
                        <input type="text" id="direccion" name="direccion"
                        class="form-control" placeholder="Dirección"
                        required />
                    </div>
                    <div class="form-group">
                        <input type="text" id="ubucacion" name="ubicacion"
                        class="form-control" placeholder="Ubicación"
                         required />
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="empresa"
                    value="Agregar Empresa" />

                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
            <h3 class="text-center">Tabla empresas</h3><br>
                <thead>
                    <tr>
                        <th>NIT</th>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Ubicación</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = ("SELECT nit, nombre, telefono, direccion, ubicacion FROM empresas");
                        $result_empresa = mysqli_query($conn, $query);

                        while($row = mysqli_fetch_array($result_empresa)): ?>
                            <tr>
                                <td><?php
                                    echo $row['nit'];
                                ?></td>
                                <td><?php
                                    echo $row['nombre'];
                                ?></td>
                                <td><?php
                                    echo $row['telefono'];
                                ?></td>
                                <td><?php
                                    echo $row['direccion'];
                                ?></td>
                                <td><?php
                                    echo $row['ubicacion'];
                                ?></td>
                                <td>
                                <a href="edit_empresa.php?nit=<?php echo $row['nit']?>" class="btn btn-secondary">
                                    <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete_empresa.php?nit=<?php echo $row['nit']?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                </td>
                            </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include('include/footer.php')?>
