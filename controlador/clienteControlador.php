<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "crtRegCliente" ||
        $ruta["query"] == "crtEditCliente"||
        $ruta["query"] == "crtEliCliente"){
        $metodo = $ruta["query"];
        $cliente = new ControladorCliente();
        $cliente->$metodo();
    }
}

class ControladorCliente
{
    static public function crtInfoClientes()
    {
        $respuesta = ModeloCliente::mdlInfoClientes();
        return $respuesta;
    }
    static public function crtRegCliente()
    {
        require "../modelo/clienteModelo.php";

        $data = array(
          "rsocial" => $_POST["rsocial"],
          "nit" => $_POST["nit"],
          "direccion" => $_POST["direccion"],
          "ncliente" => $_POST["ncliente"],
          "telefono" => $_POST["telefono"],
          "email" => $_POST["email"]
        );
        $respuesta = ModeloCliente::mdlRegCliente($data);

        echo $respuesta;
    }
    static public function crtInfoCliente($id)
    {
        $respuesta = ModeloCliente::mdlInfoCliente($id);
        return $respuesta;
    }
    static public function crtEditCliente()
    {
         require "../modelo/clienteModelo.php";

    if ($_POST["password"] == $_POST["passActual"]) {
      $password = $_POST["password"];
    } else {
      $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }


    $data = array(
      "password" => $password,
      "id" => $_POST["idcliente"],
      "perfil" => $_POST["perfil"],
      "estado" => $_POST["estado"]
    );
    ModeloCliente::mdlEditCliente($data);
    $respuesta=ModeloCliente::mdlEditCliente($data);

    echo $respuesta;
    }

    static function crtEliCliente()
  {
    require "../modelo/clienteModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloCliente::mdlEliCliente($id);
    echo $respuesta;
  }
}
