
$(obtener_registros());

function obtener_registros(buscar)
{
	$.ajax({
		url : 'views-listas/buscar_certificado.php',
		type : 'POST',
		dataType : 'html',
		data : { buscar: buscar },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});


 $('#tipo_reporte').on('change', function(){
    var id = $('#tipo_reporte').val()
    $.ajax({
      type: 'POST',
      dataType : 'html',
      url: 'views-listas/campos_reporte_avanzado.php',
      data: {'id': id}
    })
    .done(function(valores){
      $('#valor').html(valores)


    })
    .fail(function(){
      alert('Hubo un error al cargar los valores')
    })
  })



$('#mostrar').on('click', function(){

	var f1 = $('#fecha1').val()
	var f2 = $('#fecha2').val()
	var valor = $('#valor').val()
	var tipo = $('#tipo_reporte').val()

  $.ajax({
    type: 'POST',
    dataType : 'html',
    url: 'views-listas/resultados_avanzados.php',
    data: {'f1': f1,'f2': f2,'valor': valor,'tipo': tipo}

  })
  .done(function(envases){
    $('#prueba').html(envases)
   
  })
  .fail(function(){
    alert('Hubo un error al cargar los estados')
  })

   
  })


 var no_pagina = $('#no_pagina').val()
$.ajax({
		url : 'views-listas/buscar_certificado.php',
		type : 'POST',
		dataType : 'html',
		data : { pagina: no_pagina },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})

