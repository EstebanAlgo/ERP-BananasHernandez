$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'views-listas/paises.php'
  })
  .done(function(pais){
    $('#pais').html(pais)
  })
  .fail(function(){
    alert('Hubo un error al cargar los estados')
  })

  $('#pais').on('change', function(){
    var id = $('#pais').val()

    $.ajax({
      type: 'POST',
      url: 'views-listas/ciudades.php',
      data: {'id': id}
    })
    .done(function(ciudad){
      $('#ciudad').html(ciudad)
      
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })


})