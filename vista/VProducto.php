<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">

    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Lista de Productos Registrados</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>cod_producto</th>
                <th>Descripcion</th>
                <th>precio</th>
                <th>imagen</th>
                <th>estado</th>
                <td>
                  <button class="btn btn-primary" onclick="MNuevoProducto()">Nuevo</button>
                </td>
              </tr>
            </thead>
            <tbody>
            <?php
              $producto=ControladorProducto::crtInfoProductos();
              foreach($producto as $value){
              ?>

              <tr>
                <td><?php echo $value["cod_producto"];?></td>
                <td><?php echo $value["nombre_producto"];?></td>
                <td><?php echo $value["precio_producto"];?></td>
                <td><?php echo $value["imagen_producto"];?></td>
                <td> <?php
                if ($value["disponible"]==1) {
                  ?>
                  <span class="badge badge-success" >Disponible</span>
                  <?php
                }else{
                  ?>
                  <span class="badge badge-danger" >No disponible</span>
                  <?php
                }
                ?></td>
              </tr>

              <?php
              }
              ?>
            </tbody>

          </table>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->