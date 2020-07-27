//mostrar productos
function ventana(id){
  $.ajax({
    type: 'POST',
    url: 'verproducto.php',
    data: 'idproducto='+id,

    success: function (resp){
      $('#div-results').html(resp);
    }
  });
}

//elinimar Productos
function eliminar(id){
  if(confirm('¿seguro que desea eliminar el producto?')){
    $.ajax({
      type:'POST',
      url:'eliminarproductos.php',
      data:'idproducto='+id
    });
    $('#'+id).hide('slow');
  }
}
//mostrar productos al inicio
function mostrarEnInicio(id){
  var name = document.getElementsByName(id);
  for(var i=0;i<name.length;i++){
    if(name[i].checked){
      estado=name[i].value;
    }
  }
  $.ajax({
    type: 'POST',
    url: 'interuptor.php',
    data: {'id_producto': id, 'interuptor': estado},

    beforeSend:function(){
      $("#gifCargando").show('fast');
    },
    success:function(){
      $("#gifCargando").hide('fast');
      //Modal
      //success:function(respuesta){
      //$("#div-results2").html(respuesta);
      //$("#myModal2").modal("toggle");
    }
  });
}
