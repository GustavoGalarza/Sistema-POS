<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "crtRegUsuario" ||
        $ruta["query"] == "crtEditUsuario"||
        $ruta["query"] == "crtEliUsuario"){
        $metodo = $ruta["query"];
        $usuario = new ControladorUsuario();
        $usuario->$metodo();
    }
}

class ControladorUsuario
{
    static public function crtIngresoUsuario()
    {
        if (isset($_POST["usuario"])) {

            $usuario = $_POST["usuario"];
            $password = $_POST["password"];

            $resultado = ModeloUsuario::mdlAccesoUsuario($usuario);
            if ($resultado["login_usuario"] == $usuario && $resultado["password"] == $password && $resultado["estado"] == 1) {
                echo '<script> 
            
                window.location="inicio";
            
            </script>';
            }

        }
    }
    static public function crtInfoUsuarios()
    {
        $respuesta = ModeloUsuario::mdlInfoUsuarios();
        return $respuesta;
    }
    static public function crtRegUsuario()
    {
        require "../modelo/usuarioModelo.php";

        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        $data = array(
            "loginUsuario" => $_POST["login"],
            "password" => $password,
            "perfil" => "Moderador"
        );
        $respuesta = ModeloUsuario::mdlRegUsuario($data);

        echo $respuesta;
    }
    static public function crtInfoUsuario($id)
    {
        $respuesta = ModeloUsuario::mdlInfoUsuario($id);
        return $respuesta;
    }
    static public function crtEditUsuario()
    {
         require "../modelo/usuarioModelo.php";

    if ($_POST["password"] == $_POST["passActual"]) {
      $password = $_POST["password"];
    } else {
      $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    }


    $data = array(
      "password" => $password,
      "id" => $_POST["idUsuario"],
      "perfil" => $_POST["perfil"],
      "estado" => $_POST["estado"]
    );
    ModeloUsuario::mdlEditUsuario($data);
    $respuesta=ModeloUsuario::mdlEditUsuario($data);

    echo $respuesta;
    }

    static function crtEliUsuario()
  {
    require "../modelo/usuarioModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloUsuario::mdlEliUsuario($id);
    echo $respuesta;
  }
}
