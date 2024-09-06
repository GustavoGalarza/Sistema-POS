
var host = "http://localhost:5000/"

function verificarComunicacion() {
  var obj = ""
  $.ajax({
    type: "POST",
    url: host + "api/CompraVenta/Comunicacion",
    data: obj,
    cache: false,
    contentType: "apllication/json",
    processData: false,
    success: function (data) {
      if (data["transaccion"] = true) {
        document.getElementById("comunSiat").innerHTML = "Conectado"
        document.getElementById("comunSiat").className = "badge badge-success"
      }
    }
  }).fail(function (jqXHR, textStatus, errorThrown) {
    if (jqXHR.status == 0) {
      document.getElementById("comunSiat").innerHTML = "Desconectado"
      document.getElementById("comunSiat").className = "badge badge-danger"
    }
  })
}
setInterval(verificarComunicacion,3000)

function busCliente(){
  
}