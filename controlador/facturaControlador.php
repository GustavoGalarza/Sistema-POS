<?php
$ruta = parse_url($_SERVER["REQUEST_URI"]);

if (isset($ruta["query"])) {
    if (
        $ruta["query"] == "crtRegFactura" ||
        $ruta["query"] == "crtEditFactura"||
        $ruta["query"] == "crtNumFactura"||
        $ruta["query"] == "crtUltimoCufd"||
        $ruta["query"] == "crtNuevoCufd"||
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
    static function crtEliFactura()
  {
    require "../modelo/facturaModelo.php";
    $id = $_POST["id"];

    $respuesta = ModeloFactura::mdlEliFactura($id);
    echo $respuesta;
    }
    static public function crtNumFactura(){
      require "../modelo/facturaModelo.php";

      $respuesta= ModeloFactura::mdlNumFactura();

      if ($respuesta["max(id_factura)"]==null) {
        echo "1";
      }else{
        echo $respuesta["max(id_factura)"]+1;
      }
      
    }
    static public function crtNuevoCufd(){

      require "../modelo/facturaModelo.php";
      
      $data=array(
        "cufd"=>$_POST["cufd"],
        "fechaVigCufd"=>$_POST["fechaVigCufd"],
        "codControlCufd"=>$_POST["codControlCufd"]
      );
    echo ModeloFactura::mdlNuevoCufd($data);
    }
    static public function crtUltimoCufd(){
      require "../modelo/facturaModelo.php";
     
      $respuesta=ModeloFactura::mdlUltimoCufd();
      echo json_encode($respuesta);
    }
}
