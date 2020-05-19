$(document).ready(function(){
  $.ajax({
    type: 'POST',
    url: 'views-listas/estados.php'
  })
  .done(function(estados){
    $('#estados').html(estados)
  })
  .fail(function(){
    alert('Hubo un error al cargar los estados')
  })

  $('#estados').on('change', function(){
    var id = $('#estados').val()
    $.ajax({
      type: 'POST',
      url: 'views-listas/municipios.php',
      data: {'id': id}
    })
    .done(function(municipios){
      $('#municipios').html(municipios)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })


})