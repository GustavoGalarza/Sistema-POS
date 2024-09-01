
function MNuevoProducto() {
    $("#modal-default").modal("show")

    var obj = ""
    $.ajax({
        type: "POST",
        url: "vista/producto/FNuevoProducto.php",
        data: obj,
        success: function (data) {
            $("#content-default").html(data);
        }
    })
} 

function regProducto() {
    var formData=new FormData($("#FRegProducto")[0])

        $.ajax({
            type: "POST",
            url: "controlador/productoControlador.php?crtRegProducto",
            data: formData,
            cache: false,
            contentType: false, 
            processData: false,
            success: function (data) {
                if(data="ok"){
                    Swal.fire({
                        icon: 'success',
                        showConfirmButton: false,
                        title: 'El Producto ha sido registrado',
                        timer: 1000
                    })
                    setTimeout(function () {
                        location.reload()
                    },1200)
                }else{
                    Swal.fire({
                        title: "Error!",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1000
                      })
                }
            }
        })
    
    
    
}    

function MEditProducto(id){

    $("#modal-default").modal("show")
  
    var obj=""
    $.ajax({
      type:"POST",
      url:"vista/producto/FEditProducto.php?id="+id,
      data:obj,
      success:function(data){
        $("#content-default").html(data)
      }
  
    })
  }
function editProducto(){
    var formData=new FormData($("#FEditProducto")[0])

    if(formData.get("password")==formData.get("vrPassword")){
  
      $.ajax({
        type:"POST",
        url:"controlador/productoControlador.php?crtEditProducto",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data){
            if(data="ok"){
  
            Swal.fire({
              icon: 'success',
              showConfirmButton: false,
              title: 'El Producto ha sido actualizado Exitosamente!',
              timer: 1000
            })
            setTimeout(function(){
              location.reload()
            },1200)
  
          }else{
            Swal.fire({
              title: "Error!",
              icon: "error",
              showConfirmButton: false,
              timer: 1000
            })
          }


        }
  
      })
  
    }
  
}
function MEliProducto(id){
    var obj={
        id:id
      }
      Swal.fire({
        title:"Estas seguro de eliminar este Producto?",
        showDenyButton:true,
        showCancelButton:false,
        confirmButtonText:'Confirmar',
        denyButtonText:'Cancelar'
      }).then((result)=>{
        if(result.isConfirmed){
          $.ajax({
            type:"POST",
            url:"controlador/productoControlador.php?crtEliProducto",
            data:obj,
            success:function(data){
              if(data=="ok"){
                Swal.fire({
                    icon: 'success',
                    showConfirmButton: false,
                    title: 'El Producto ha sido eliminado Exitosamente!',
                    timer: 1000
                  })
                  setTimeout(function(){
                    location.reload()
                  },1200)
              }else{
                Swal.fire({
                  icon: 'error',
                  showConfirmButton: false,
                  title: 'Error',
                  text:'El Producto no puede ser eliminado',
                  timer: 1000
                })
              }
            }
          })
        }
      })
}

function previsualizar(){
  let imagen=document.getElementById("imgProducto").files[0]
  if (imagen["type"]!="image/jpeg" && imagen["type"]!="image/png") {
    $("#imgProducto").val("")
    Swal.fire({
      icon: 'error',
      showConfirmButton: false,
      title: 'El Archivo no es JPG o PNG!',
    })
  }else if(imagen["size"]>10000000){
    $("#imgProducto").val("")
    Swal.fire({
      icon: 'error',
      showConfirmButton: false,
      title: 'El Archivo supera los 10MB',
    })
  }else{
    let datosImagen=new FileReader
    datosImagen.readAsDataURL(imagen)
    $(datosImagen).on("load", function(event){
      let rutaImagen=event.target.result
      $(".previsualizar").attr("src",rutaImagen)
    })
  }
  }

function SinCatalogo(){
  var obj={
    codigoambiente: 2,
    codigoPuntoVenta: 0,
    codigoPuntoVentaSpecified: true,
    codigoSistema:"775FA42BE90F7B78EF98F57",
    codigoSucursal:0,
    cuis:"9272DC05",
    nit:338794023
  }
  $.ajax({
    type: "POST",
    url: "http://localhost:5000/Sincronizacion/listaproductosservicios?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJTdXBlcmppY2hvMzMiLCJjb2RpZ29TaXN0ZW1hIjoiNzc1RkE0MkJFOTBGN0I3OEVGOThGNTciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0ydGpDM05ERXdNZ1lBOFFXMzNRa0FBQUE9IiwiaWQiOjYxODYwOCwiZXhwIjoxNzMzOTYxNjAwLCJpYXQiOjE3MDI0OTc2NjAsIm5pdERlbGVnYWRvIjozMzg3OTQwMjMsInN1YnNpc3RlbWEiOiJTRkUifQ.4K_pQUXnIhgI5ymmXoyL43i0pSk3uKCgLMkmQeyl67h7j55GSRsH120AD44pR0aQ1UX_FNYzWQBYrX6pWLd-1w", 
    data: JSON.stringify(obj),
    cache: false,
    contentType: "application/json", 
    success: function (data) {
        for(var i=0; i<data["listaCodigos"].length; i++){
          $("#CatProductos").append("<tr><td>"+data["listaCodigos"][i]["codigoActividad"]+"</td><td>"+data["listaCodigos"][i]["codigoProducto"]+"</td><td>"+data["listaCodigos"][i]["descripcionProducto"]+"</td></tr>"   )
        }
    }
  })
}

function unidadesMedida(){
  var obj={
    codigoambiente: 2,
    codigoPuntoVenta: 0,
    codigoPuntoVentaSpecified: true,
    codigoSistema:"775FA42BE90F7B78EF98F57",
    codigoSucursal:0,
    cuis:"9272DC05",
    nit:338794023
  }
  $.ajax({
    type: "POST",
    url: "http://localhost:5000/Sincronizacion/unidadmedida?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzUxMiJ9.eyJzdWIiOiJTdXBlcmppY2hvMzMiLCJjb2RpZ29TaXN0ZW1hIjoiNzc1RkE0MkJFOTBGN0I3OEVGOThGNTciLCJuaXQiOiJINHNJQUFBQUFBQUFBRE0ydGpDM05ERXdNZ1lBOFFXMzNRa0FBQUE9IiwiaWQiOjYxODYwOCwiZXhwIjoxNzMzOTYxNjAwLCJpYXQiOjE3MDI0OTc2NjAsIm5pdERlbGVnYWRvIjozMzg3OTQwMjMsInN1YnNpc3RlbWEiOiJTRkUifQ.4K_pQUXnIhgI5ymmXoyL43i0pSk3uKCgLMkmQeyl67h7j55GSRsH120AD44pR0aQ1UX_FNYzWQBYrX6pWLd-1w", 
    data: JSON.stringify(obj),
    cache: false,
    contentType: "application/json", 
    success: function (data) {
        for(var i=0; i<data["listaCodigos"].length; i++){
          $("#CatProductos").append("<tr><td>"+data["listaCodigos"][i]["codigoActividad"]+"</td><td>"+data["listaCodigos"][i]["codigoProducto"]+"</td><td>"+data["listaCodigos"][i]["descripcionProducto"]+"</td></tr>"   )
        }
    }
  })
}