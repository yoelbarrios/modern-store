function validarformulario(){
    //nombre producto
    if(document.formproductos.nombre.value==""){
      //mostrar alertaz
      $('#avisoproducto').show('fast');
      document.formproductos.nombre.style.border='1px solid red';
    }
    //precio
    if(document.formproductos.precio.value==""){
      //mostrar alerta
      $('#avisoprecio').show('fast');
      document.formproductos.precio.style.border='1px solid red';
    }
    //descripcion
    if(document.formproductos.descripcion.value==""){
      //mostrar alerta
      $('#avisodescripcion').show('fast');
      document.formproductos.descripcion.style.border='1px solid red';
    }
    //categoria
    if(document.formproductos.categoria.value==""){
      //mostrar alerta
      $('#avisocategoria').show('fast');
      document.formproductos.categoria.style.border='1px solid red';
    }
    if(document.formproductos.nombre.value!="" && document.formproductos.precio.value!="" &&
    document.formproductos.descripcion.value!="" && document.formproductos.categoria.value!=""){
      var nombre= document.formproductos.nombre.value;
      var precio= document.formproductos.precio.value;
      var descripcion= document.formproductos.descripcion.value;
      var categoria= document.formproductos.categoria.value;

      $.ajax({
        type: "POST",
        url:"agregarproductos.php",
        data: {
          nombre:nombre,
          precio:precio,
          descripcion:descripcion,
          categoria:categoria
        },
        success:function(resp){
          $("#nombrerepetido").hide('fast');
          $("#exito").hide('fast');

          if(resp=="exito"){
            $("#nombrerepetido").hide('fast');
            $("#exito").show('slow');
          }
          if(resp=="nombrerepetido"){
            $("#exito").hide('fast');
            $("#nombrerepetido").show('slow');
            document.formproductos.nombre.style.border='1px solid red';
          }
        }
      });
    }
}
//start zona de exito al validar
function validarnombre(){
  //ocultar alerta
  $('#avisonombre').hide('slow');
  document.formproductos.producto.style.border='1px solid green';
}
function validarprecio(){
  //ocultar alerta
  $('#avisoprecio').hide('slow');
  document.formproductos.precio.style.border='1px solid green';
}
function validardescripcion(){
  //ocultar alerta
  $('#avisodescripcion').hide('slow');
  document.formproductos.descripcion.style.border='1px solid green';
}
//end zona de exito al validar
