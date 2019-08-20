
$(document).ready( function(){
  $("#formulario").submit( function(event){
    $(".obrigatorio").each(function(){
      var valor = $(this).val();
      if(valor == ""){
        $(this).next("span").text("Campo obrigatorio")
        event.preventDefault();
      }

    }); //fim each
  }); //fim submit
}); //fim ready
