<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "crtRegProducto" ||
        $ruta["query"] == "crtEditProducto"||
        $ruta["query"] == "crtEliProducto"){
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

        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $data = array(
            "loginProducto" => $_POST["login"],
            "password" => $password,
            "perfil" => "Moderador"
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

    if ($_POST["password"] == $_POST["passActual"]) {
      $password = $_POST["password"];
    } else {
      $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }


    $data = array(
      "password" => $password,
      "id" => $_POST["idProducto"],
      "perfil" => $_POST["perfil"],
      "estado" => $_POST["estado"]
    );
    ModeloProducto::mdlEditProducto($data);
    $respuesta=ModeloProducto::mdlEditProducto($data);

    echo $respuesta;
    }

    static function crtEliProducto()
  {
    require "../modelo/productoModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloProducto::mdlEliProducto($id);
    echo $respuesta;
  }
}
