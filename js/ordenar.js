function fOrdenar(id){
    var orden=document.form1.ordenar.value;
    location.href="../php/verproductos.php?orden="+orden+"&id_categoria="+id;
}