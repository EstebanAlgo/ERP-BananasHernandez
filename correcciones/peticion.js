
$(obtener_registros());

function obtener_registros(buscar,tipo_folio)
{   
	$.ajax({
		url : 'buscar_certificado.php',
		type : 'POST',
		dataType : 'html',
		data : { buscar: buscar ,tipo:tipo_folio},
		})

	.done(function(resultado){
		$("#tabla").html(resultado);
	})
}

$(document).on('keyup', '#valor', function()
{
	var valorBusqueda=$(this).val();
	var tipo_folio = $('#tipo').val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda,tipo_folio);
	}
	else
		{
			obtener_registros();
		}
});

