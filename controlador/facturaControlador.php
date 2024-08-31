<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "crtRegFactura" ||
        $ruta["query"] == "crtEditFactura"||
        $ruta["query"] == "crtEliFactura"){
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
    static public function crtRegFactura()
    {
        require "../modelo/facturaModelo.php";

        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $data = array(
            "loginFactura" => $_POST["login"],
            "password" => $password,
            "perfil" => "Moderador"
        );
        $respuesta = ModeloFactura::mdlRegFactura($data);

        echo $respuesta;
    }
    static public function crtInfoFactura($id)
    {
        $respuesta = ModeloFactura::mdlInfoFactura($id);
        return $respuesta;
    }
    static public function crtEditFactura()
    {
         require "../modelo/facturaModelo.php";

    if ($_POST["password"] == $_POST["passActual"]) {
      $password = $_POST["password"];
    } else {
      $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }


    $data = array(
      "password" => $password,
      "id" => $_POST["idFactura"],
      "perfil" => $_POST["perfil"],
      "estado" => $_POST["estado"]
    );
    ModeloFactura::mdlEditFactura($data);
    $respuesta=ModeloFactura::mdlEditFactura($data);

    echo $respuesta;
    }

    static function crtEliFactura()
  {
    require "../modelo/facturaModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloFactura::mdlEliFactura($id);
    echo $respuesta;
  }
}