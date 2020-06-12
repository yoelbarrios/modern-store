function eliminar(id){
  if(confirm("¿Está seguro que desea eliminar la categoria de forma permanente?")){
    //redireccionamos y enviamos la variable idcategoria
    //location.href="eliminarcategorias.php?idcategoria="+id;
    //ajax
    $.ajax({
      type:"POST",
      url: "eliminarcategorias.php",
      data:'idcategoria='+id
    });
    //ocultar el elemento eliminado
    $("#"+id).hide("slow");
  }
}
