<?php
require_once "../../controlador/productoControlador.php";
require_once "../../modelo/productoModelo.php";

$id = $_GET["id"];

$producto = ControladorProducto::crtInfoProducto($id);

?>
<div class="modal-header bg-primary">
    <h4 class="modal-title">Informacion del Producto</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-6">
            <table class="table">
                <tr>
                    <th>cod. Producto</th>
                    <td>
                    <?php  echo $producto["cod_producto"]?>
                    </td>
                </tr>
                <tr>
                    <th>cod_producto_sin</th>
                    <td>
                    <?php  echo $producto["cod_producto_sin"]?>
                    </td>
                </tr>
                <tr>
                    <th>nombre_producto</th>
                    <td>
                    <?php  echo $producto["nombre_producto"]?>
                    </td>
                </tr>
                <tr>
                    <th>precio_producto</th>
                    <td>
                    <?php  echo $producto["precio_producto"]?>
                    </td>
                </tr>
                <tr>
                    <th>unidad_medida</th>
                    <td>
                    <?php  echo $producto["unidad_medida"]?>
                    </td>
                </tr>
                <tr>
                    <th>unidad_medida_sin</th>
                    <td>
                    <?php  echo $producto["unidad_medida_sin"]?>
                    </td>
                </tr>
                <tr>
                    <th>Disponibilidad</th>
                    <td>
                    <?php
                if ($producto["disponible"]==1) {
                  ?>
                  <span class="badge badge-success" >Disponible</span>
                  <?php
                }else{
                  ?>
                  <span class="badge badge-danger" >No disponible</span>
                  <?php
                }
                ?>
                    </td>
                </tr>
                 
            </table>
        </div>
        <div class="col-sm-6">
        <?php 
                if($producto["imagen_producto"]==""){
                    ?>
                      <img src="assest/dist/img/product_default.png" alt="" width="300" class="img-thumbnail">
                    <?php
                }else{
                  ?>
                  <img src="assest/dist/img/productos/<?php  echo $producto["imagen_producto"];?>" alt="" width="300" class="img-thumbnail">
                  <?php
                }
               ?></div>
    </div>
</div>

<footer class="main-footer">
  <!-- To the right -->
  <div class="float-right d-none d-sm-inline">
    Un sistema de punto de venta
  </div>
  <!-- Default to the left -->
  <strong>Copyright &copy; 2024 <a href="https://ekesoft.net">Informatica </a>.</strong> Derechos reservados
</footer>
