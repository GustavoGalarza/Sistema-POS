<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
  if (
    $ruta["query"] == "crtRegProducto" ||
    $ruta["query"] == "crtEditProducto" ||
    $ruta["query"] == "crtBusProducto" ||
    $ruta["query"] == "crtEliProducto"
  ) {
    $metodo = $ruta["query"];
    $producto = new ControladorProducto();
    $producto->$metodo();
  }
}

class ControladorProducto
{
  static public function crtInfoProductos()
  {
    $respuesta = ModeloProducto::mdlInfoProductos();
    return $respuesta;
  }
  static public function crtRegProducto()
  {
    require "../modelo/productoModelo.php";

    $imagen = $_FILES["imgProducto"];
    $imgNombre = $imagen["name"];
    $imgTmp = $imagen["tmp_name"];

    move_uploaded_file($imgTmp, "../assest/dist/img/productos/" . $imgNombre);

    $data = array(
      "codProducto" => $_POST["codProducto"],
      "codProductoSIN" => $_POST["codProductoSIN"],
      "desProducto" => $_POST["desProducto"],
      "preProducto" => $_POST["preProducto"],
      "unidadMedidad" => $_POST["unidadMedidad"],
      "unidadMedidadSIN" => $_POST["unidadMedidadSIN"],
      "imgProducto" => $imgNombre,
    );
    $respuesta = ModeloProducto::mdlRegProducto($data);

    echo $respuesta;
  }
  static public function crtInfoProducto($id)
  {
    $respuesta = ModeloProducto::mdlInfoProducto($id);
    return $respuesta;
  }
  static public function crtEditProducto()
  {
    require "../modelo/productoModelo.php";
    $imagen = $_FILES["imgProducto"];
    if ($imagen["name"] == "") {
      $imgNombre = $_POST["imgActual"];
    } else {
      $imgNombre = $imagen["name"];
      $imgTmp = $imagen["tmp_name"];
      move_uploaded_file($imgTmp, "../assest/dist/img/productos/" . $imgNombre);
    }


    $data = array(
      "idProducto" => $_POST["id_producto"],
      "codProductoSIN" => $_POST["codProductoSIN"],
      "desProducto" => $_POST["desProducto"],
      "preProducto" => $_POST["preProducto"],
      "unidadMedidad" => $_POST["unidadMedidad"],
      "unidadMedidadSIN" => $_POST["unidadMedidadSIN"],
      "estado" => $_POST["estado"],
      "imgProducto" => $imgNombre,
    );

    $respuesta = ModeloProducto::mdlEditProducto($data);

    echo $respuesta;
  }
  static public function crtEliProducto()
  {
    require "../modelo/productoModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloProducto::mdlEliProducto($id);
    echo $respuesta;
  }
  static public function crtBusProducto()
  {
    require "../modelo/productoModelo.php";

    $codProducto = $_POST["codProducto"];
    $respuesta = ModeloProducto::mdlBusProducto($codProducto);
    echo json_encode($respuesta);

  }



}
