<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
  if ($ruta["query"] == "crtNumFactura" ||
    $ruta["query"] == "crtUltimoCufd" ||
    $ruta["query"] == "crtLeyenda" ||
    $ruta["query"] == "crtRegistrarFatura" ||
    $ruta["query"] == "crtInfoFacturas" ||
    $ruta["query"] == "crtInfoFactura" ||
    $ruta["query"] == "crtNuevoCufd" ||
    $ruta["query"] == "crtEliFactura"
  ) {
    $metodo = $ruta["query"];
    $factura = new ControladorFactura();
    $factura->$metodo();
  }
}

class ControladorFactura
{

  static public function crtInfoFacturas()
  {
    $respuesta = ModeloFactura::mdlInfoFacturas();
    return $respuesta;
  }
  static public function crtInfoFactura($id)
  {
    $respuesta = ModeloFactura::mdlInfoFactura($id);
    return $respuesta;
  }
  static function crtEliFactura()
  {
    require "../modelo/facturaModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloFactura::mdlEliFactura($id);
    echo $respuesta;
  }
  static public function crtNumFactura()
  {
    require "../modelo/facturaModelo.php";

    $respuesta = ModeloFactura::mdlNumFactura();

    if ($respuesta["max(id_factura)"] == null) {
      echo "1";
    } else {
      echo $respuesta["max(id_factura)"] + 1;
    }

  }
  static public function crtNuevoCufd()
  {

    require "../modelo/facturaModelo.php";

    $data = array(
      "cufd" => $_POST["cufd"],
      "fechaVigCufd" => $_POST["fechaVigCufd"],
      "codControlCufd" => $_POST["codControlCufd"]
    );
    echo ModeloFactura::mdlNuevoCufd($data);
  }

  static public function crtUltimoCufd()
  {
    require "../modelo/facturaModelo.php";

    $respuesta = ModeloFactura::mdlUltimoCufd();
    echo json_encode($respuesta);
  }
  static public function crtLeyenda()
  {
    require "../modelo/facturaModelo.php";

    $respuesta = ModeloFactura::mdlLeyenda();
    echo json_encode($respuesta);
  }
  static public function crtRegistrarFatura(){
    require "../modelo/facturaModelo.php";

     $data=array(
      "codFactura"=>$_POST["codFactura"],
      "idCliente"=>$_POST["idCliente"],
      "detalle"=>$_POST["detalle"],
      "neto"=>$_POST["neto"],
      "descuento"=>$_POST["descuento"],
      "total"=>$_POST["total"],
      "fechaEmision"=>$_POST["fechaEmision"],
      "cufd"=>$_POST["cufd"],
      "cuf"=>$_POST["cuf"],
      "xml"=>$_POST["xml"],
      "idUsuario"=>$_POST["idUsuario"],
      "usuario"=>$_POST["usuario"],
      "leyenda"=>$_POST["leyenda"]
     );
    $respuesta=ModeloFactura::mdlRegistrarFactura($data);
    echo $respuesta;

  }


}
