<?php include('db.php') ?>

<?php include('include/header.php')?>

<div class="container-fluid p-4">
    <div class="row">
        <div class="col-md-3" >
          <h3 class="text-center"><a href="index.php">Agreagr Empresas</a></h3><br>
            <div class="card card-body">
            <h3 class="text-center">Clientes</h3><br>
                <form action="save_clientes.php" method="POST" >
                    <div class="form-group">
                        <input type="text" name="nombre_cli" class="form-control"
                        placeholder="Nombre" autofocus required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="apellido"
                        class="form-control" placeholder="Apellidos"
                        required />
                    </div>
                    <div class="form-group">
                        <input type="number" name="identificacion"
                        class="form-control" placeholder="Identificación"
                        required />
                    </div>
                    <div class="form-group">
                        <input type="number" name="telefono_cli"
                        class="form-control" placeholder="Télefono"
                        required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="direccion_cli"
                        class="form-control" placeholder="Dirección"
                         required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="pais"
                        class="form-control" placeholder="Pais"
                         required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="idioma"
                        class="form-control" placeholder="Idioma"
                         required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="moneda"
                        class="form-control" placeholder="Moneda"
                         required />
                    </div>
                    <div class="form-group">
                        <input type="text" name="pago"
                        class="form-control" placeholder="Forma de Pago"
                         required />
                    </div>
                    <div class="form-group">
                      <select class="custom-select" id="empresaSelect" name="empresa">
                            <option value="">SELECCIONE LA EMPRESA</option>
                           <?php
                               $sql = "SELECT nit FROM empresas";
                               if (!$result = $conn->query($sql)) {
                                   echo "Error al consultar base de datos.";
                                   echo "Error: " . $conn->error . "\n";
                               }
                               while ($empresas = $result->fetch_assoc()) {
                                   echo "<option>".$empresas['nit']."</option>\n";
                               }
                           ?>
                      </select>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="cliente"
                    value="Agregar Cliente" />
                </form>
            </div>
        </div>

        <div class="col-md-9">
            <table class="table table-bordered">
            <h3 class="text-center">Tabla clientes</h3><br>
                <thead>
                    <tr>
                        <th>Identificación</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Pais</th>
                        <th>Idioma</th>
                        <th>Moneda</th>
                        <th>FormaDePago</th>
                        <th>Empresa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = ("SELECT identificacion,
                        nombres,
                        apellidos,
                        telefono,
                        direccion,
                        pais,
                        idioma,
                        moneda,
                        forma_pago,
                        nit_empresa FROM clientes");
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_array($result)): ?>
                            <tr>
                                <td><?php
                                    echo $row['identificacion'];
                                ?></td>
                                <td><?php
                                    echo $row['nombres'];
                                ?></td>
                                <td><?php
                                    echo $row['apellidos'];
                                ?></td>
                                <td><?php
                                    echo $row['telefono'];
                                ?></td>
                                <td><?php
                                    echo $row['direccion'];
                                ?></td>
                                <td><?php
                                    echo $row['pais'];
                                ?></td>
                                <td><?php
                                    echo $row['idioma'];
                                ?></td>
                                <td><?php
                                    echo $row['moneda'];
                                ?></td>
                                <td><?php
                                    echo $row['forma_pago'];
                                ?></td>
                                <td><?php
                                    echo $row['nit_empresa'];
                                ?></td>
                            </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include('include/footer.php')?>
