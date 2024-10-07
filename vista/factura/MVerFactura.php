<?php
require_once "../../controlador/facturaControlador.php";
require_once "../../modelo/facturaModelo.php";

$id = $_GET["id"];

$factura = ControladorFactura::crtInfoFactura($id);
$producto = json_decode($factura["detalle"], true);

?>
<div class="modal-header bg-primary">
    <h4 class="modal-title">Informacion del Factura</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-sm-6">
            <table class="table">
                <tr>
                    <th># Factura</th>
                    <td><?php echo $factura["cod_factura"] ?></td>
                </tr>
                <tr>
                    <th>Cliente:</th>
                    <td><?php echo $factura["razon_social_cliente"]?></td>
                    
                </tr>
                <tr>
                    <th>Nit/CI:</th>
                    <td><?php echo $factura["nit_ci_cliente"] ?></td>
                </tr>
                <tr>
                    <th>Fecha:</th>
                    <td><?php echo $factura["fecha_emision"] ?></td>
                </tr>
                <tr>
                    <th>Estado</th>
                    <td>
                        <?php
                        if ($factura["estado_factura"] == 1) {
                            ?>
                            <span class="badge badge-success">Emitado</span>
                            <?php
                        } else {
                            ?>
                            <span class="badge badge-danger">Anulado</span>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Emitido por:</th>
                    <td>
                        <?php echo $factura["usuario"] ?>
                    </td>
                </tr>
                


            </table>
        </div>
        <div class="col-sm-6" style="text-align:center">
            <table class="table">
                <thead>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio(Bs.)</th>
                    <th>Descuento(Bs.)</th>
                    <th>Total(Bs.)</th>
                </thead>
                <tbody>
                        <?php 
                        foreach ($producto as $value) {
                            ?>
                            <td><?php echo $value["descripcion"]?></td>
                            <td><?php echo $value["cantidad"]?></td>
                            <td><?php echo $value["precioUnitario"]?></td>
                            <td><?php echo $value["montoDescuento"]?></td>
                            <td><?php echo $value["subTotal"]?></td>
                            <?php
                        }
                        ?>
                        <tr>
                            <td colspan="4"><b>Total</b></td>
                            <td><?php echo $factura["neto"]?></td>
                        </tr>
                </tbody>
            </table>
        </div>
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