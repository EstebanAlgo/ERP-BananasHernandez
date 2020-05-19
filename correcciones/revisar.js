
$(obtener_registros());

function obtener_registros(buscar,tipo_folio,valor2,valor3,piv1,piv2,piv3)
{   
	$.ajax({
		url : 'revisar.php',
		type : 'POST',
		dataType : 'html',
		data : { update: buscar ,tipo:tipo_folio,valor2:valor2,valor3:valor3,piv1:piv1,piv2:piv2,piv3:piv3},
		})

	.done(function(resultado){
		$("#actualizacion").html(resultado);
	})
}

$(document).on('keyup', '#update', function()
{
	var valorBusqueda=$(this).val();
	var tipo_folio = $('#tipo').val();
	var valor2 = $('#valor2').val();
	var valor3 = $('#valor3').val();
	var piv1 = $('#piv1').val();
	var piv2 = $('#piv2').val();
	var piv3 = $('#piv3').val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda,tipo_folio,valor2,valor3,piv1,piv2,piv3);
	}
	else
		{
			obtener_registros();
		}
});
