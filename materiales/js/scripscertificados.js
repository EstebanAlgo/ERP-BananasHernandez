
$(document).ready(function(){
	 var option="";
	 var optionorigen="";
	 var contador_origen=1;
	 var contador_envases=1;
   

	 $('#datos2').hide();
	 $('#datos3').hide();
	 $('#datos4').hide();
	 $('#datos5').hide();
   $('#datos6').hide();
   $('#datos7').hide();
   $('#datos8').hide();
   $('#datos9').hide();
   $('#datos10').hide();


 //llenado de estados------------------------------------------------- 
  $.ajax({
    type: 'POST',
    url: 'certificados/views-listas/estados.php'
  })
  .done(function(estados){
    $('#estado').html(estados)
  })
  .fail(function(){
    //alert('Hubo un error al cargar los estados')
  })
//llenado de estados chofer------------------------------------------------- 
  $.ajax({
    type: 'POST',
    url: 'certificados/views-listas/estados.php'
  })
  .done(function(estados){
    $('#estado_chofer').html(estados)
  })
  .fail(function(){
    //alert('Hubo un error al cargar los estados')
  })

   //autorellenado de campos de origen 1
  $('#estado').on('change', function(){
    var id = $('#estado').val()
    var cont=1;
    $.ajax({
      type: 'POST',
      url: 'certificados/views-listas/municipios.php',
      data: {'id': id}
    })
    .done(function(municipios){
      $('#municipio').html(municipios)
    })
    .fail(function(){
      //alert('Hubo un error al cargar los municipios')
    })
  })
 //llenado de remitentes------------------------------------------------- 
  $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-clientes.php'
  })
  .done(function(remitentes){
    $('#cliente').html(remitentes)
  })
  .fail(function(){
    //alert('Hubo un error al cargar los estados')
  })

//actualizar remitentes------------------------------------------------- 
  $('#actualizar_remitente').on('click', function(){
    $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-clientes.php'
  })
  .done(function(remitentes){
    $('#cliente').html(remitentes)
  })
  .fail(function(){
    //alert('Hubo un error al cargar los estados')
  })
  })

  //llenado de producto--------------------------------------------------

  $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-productos.php'
  })
  .done(function(producto){
    $('#producto').html(producto)
  })
  .fail(function(){
    //alert('Hubo un error al cargar los estados')
  })
//ACTUALIZAR de producto--------------------------------------------------
  $('#actualizar_producto').on('click', function(){
    $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-productos.php'
  })
  .done(function(producto){
    $('#producto').html(producto)
  })
  .fail(function(){
    //alert('Hubo un error al cargar los estados')
  })
  })

  //llenado de envase--------------------------------------------------

  $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-envases.php'
  })
  .done(function(envases){
    $('#envases1').html(envases)
    $('#envases2').html(envases)
    $('#envases3').html(envases)
    $('#envases4').html(envases)
    $('#envases5').html(envases)
    $('#envases6').html(envases)
    $('#envases7').html(envases)
    $('#envases8').html(envases)
    $('#envases9').html(envases)
    $('#envases10').html(envases)

  })
  .fail(function(){
   // alert('Hubo un error al cargar los estados')
  })


//ACTUALIZAR envase--------------------------------------------------
$('#actualizar_envase').on('click', function(){

  $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-envases.php'
  })
  .done(function(envases){
    $('#envases1').html(envases)
    $('#envases2').html(envases)
    $('#envases3').html(envases)
    $('#envases4').html(envases)
    $('#envases5').html(envases)
    $('#envases6').html(envases)
    $('#envases7').html(envases)
    $('#envases8').html(envases)
    $('#envases9').html(envases)
    $('#envases10').html(envases)

  })
  .fail(function(){
    //alert('Hubo un error al cargar los estados')
  })

   
  })

   //LLENADO DE ORIGEN 1--------------------------------------------------

  $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-origen.php'
  })
  .done(function(fincas){
    $('#fincas1').html(fincas)
    $('#fincas2').html(fincas)
    $('#fincas3').html(fincas)
    $('#fincas4').html(fincas)
    $('#fincas5').html(fincas)
    $('#fincas6').html(fincas)
    $('#fincas7').html(fincas)
    $('#fincas8').html(fincas)
    $('#fincas9').html(fincas)
    $('#fincas10').html(fincas)
  })
  .fail(function(){
    //alert('Hubo un error al cargar los estados')
  })
//ACTUALIZAR DE ORIGEN 1--------------------------------------------------
$('#actualizar_origen1').on('click', function(){
 $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-origen.php'
  })
  .done(function(fincas){
    $('#fincas1').html(fincas)
  })
  .fail(function(){
    //alert('Hubo un error al cargar los estados')
  })
   
  })
//ACTUALIZAR DE ORIGEN 2--------------------------------------------------
$('#actualizar_origen2').on('click', function(){
 $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-origen.php'
  })
  .done(function(fincas){
    $('#fincas2').html(fincas)
  })
  .fail(function(){
   // alert('Hubo un error al cargar los estados')
  })
   
  })

//ACTUALIZAR DE ORIGEN 3--------------------------------------------------
$('#actualizar_origen3').on('click', function(){
 $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-origen.php'
  })
  .done(function(fincas){
    $('#fincas3').html(fincas)
  })
  .fail(function(){
    alert('Hubo un error al cargar los estados')
  })
   
  })
//ACTUALIZAR DE ORIGEN 4--------------------------------------------------
$('#actualizar_origen4').on('click', function(){
 $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-origen.php'
  })
  .done(function(fincas){
    $('#fincas4').html(fincas)
  })
  .fail(function(){
    alert('Hubo un error al cargar los estados')
  })
   
  })

//ACTUALIZAR DE ORIGEN 5--------------------------------------------------
$('#actualizar_origen5').on('click', function(){
 $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-origen.php'
  })
  .done(function(fincas){
    $('#fincas5').html(fincas)
  })
  .fail(function(){
    alert('Hubo un error al cargar los estados')
  })
   
  })
//ACTUALIZAR DE ORIGEN 6--------------------------------------------------
$('#actualizar_origen6').on('click', function(){
 $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-origen.php'
  })
  .done(function(fincas){
    $('#fincas6').html(fincas)
  })
  .fail(function(){
    alert('Hubo un error al cargar los estados')
  })
   
  })
//ACTUALIZAR DE ORIGEN 7--------------------------------------------------
$('#actualizar_origen7').on('click', function(){
 $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-origen.php'
  })
  .done(function(fincas){
    $('#fincas7').html(fincas)
  })
  .fail(function(){
    alert('Hubo un error al cargar los estados')
  })
   
  })
//ACTUALIZAR DE ORIGEN 8--------------------------------------------------
$('#actualizar_origen8').on('click', function(){
 $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-origen.php'
  })
  .done(function(fincas){
    $('#fincas8').html(fincas)
  })
  .fail(function(){
    alert('Hubo un error al cargar los estados')
  })
   
  })
//ACTUALIZAR DE ORIGEN 9--------------------------------------------------
$('#actualizar_origen9').on('click', function(){
 $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-origen.php'
  })
  .done(function(fincas){
    $('#fincas9').html(fincas)
  })
  .fail(function(){
    alert('Hubo un error al cargar los estados')
  })
   
  })
//ACTUALIZAR DE ORIGEN 10--------------------------------------------------
$('#actualizar_origen10').on('click', function(){
 $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-origen.php'
  })
  .done(function(fincas){
    $('#fincas10').html(fincas)
  })
  .fail(function(){
    alert('Hubo un error al cargar los estados')
  })
   
  })
  //autorellenado de campos de origen 1
  $('#fincas1').on('change', function(){
    var id = $('#fincas1').val()
    var cont=1;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/vista-empacadora.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(empacadora){
      $('#reg_empacadora').html(empacadora)
    })
    .fail(function(){
      //alert('Hubo un error al cargar los municipios')
    })
  })

  $('#fincas1').on('change', function(){
    var id = $('#fincas1').val()
    var cont=1;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/direccion-fincas.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(direccion_finca){
      $('#direccion_origen').html(direccion_finca)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  //autorellenado de campos de origen 2--------------------------
  $('#fincas2').on('change', function(){
    var id = $('#fincas2').val()
    var cont=2;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/vista-empacadora.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(empacadora){
      $('#reg_empacadora2').html(empacadora)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  $('#fincas2').on('change', function(){
    var id = $('#fincas2').val()
    var cont=2;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/direccion-fincas.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(direccion_finca){
      $('#direccion_origen2').html(direccion_finca)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

 //autorellenado de campos de origen 3--------------------------
  $('#fincas3').on('change', function(){
    var id = $('#fincas3').val()
     var cont=3;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/vista-empacadora.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(empacadora){
      $('#reg_empacadora3').html(empacadora)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  $('#fincas3').on('change', function(){
    var id = $('#fincas3').val()
    var cont=3;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/direccion-fincas.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(direccion_finca){
      $('#direccion_origen3').html(direccion_finca)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  //autorellenado de campos de origen 4--------------------------
  $('#fincas4').on('change', function(){
    var id = $('#fincas4').val()
    var cont=4;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/vista-empacadora.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(empacadora){
      $('#reg_empacadora4').html(empacadora)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  $('#fincas4').on('change', function(){
    var id = $('#fincas4').val()
    var cont=4;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/direccion-fincas.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(direccion_finca){
      $('#direccion_origen4').html(direccion_finca)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })
  //autorellenado de campos de origen 5--------------------------
  $('#fincas5').on('change', function(){
    var id = $('#fincas5').val()
    var cont=5;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/vista-empacadora.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(empacadora){
      $('#reg_empacadora5').html(empacadora)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  $('#fincas5').on('change', function(){
    var id = $('#fincas5').val()
    var cont=5;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/direccion-fincas.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(direccion_finca){
      $('#direccion_origen5').html(direccion_finca)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  //autorellenado de campos de origen 6--------------------------
  $('#fincas6').on('change', function(){
    var id = $('#fincas6').val()
    var cont=6;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/vista-empacadora.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(empacadora){
      $('#reg_empacadora6').html(empacadora)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  $('#fincas6').on('change', function(){
    var id = $('#fincas6').val()
    var cont=6;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/direccion-fincas.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(direccion_finca){
      $('#direccion_origen6').html(direccion_finca)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  //autorellenado de campos de origen 7--------------------------
  $('#fincas7').on('change', function(){
    var id = $('#fincas7').val()
    var cont=7;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/vista-empacadora.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(empacadora){
      $('#reg_empacadora7').html(empacadora)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  $('#fincas7').on('change', function(){
    var id = $('#fincas7').val()
    var cont=7;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/direccion-fincas.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(direccion_finca){
      $('#direccion_origen7').html(direccion_finca)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  //autorellenado de campos de origen 8--------------------------
  $('#fincas8').on('change', function(){
    var id = $('#fincas8').val()
    var cont=8;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/vista-empacadora.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(empacadora){
      $('#reg_empacadora8').html(empacadora)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  $('#fincas8').on('change', function(){
    var id = $('#fincas8').val()
    var cont=8;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/direccion-fincas.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(direccion_finca){
      $('#direccion_origen8').html(direccion_finca)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

//autorellenado de campos de origen 9--------------------------
  $('#fincas9').on('change', function(){
    var id = $('#fincas9').val()
    var cont=9;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/vista-empacadora.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(empacadora){
      $('#reg_empacadora9').html(empacadora)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  $('#fincas9').on('change', function(){
    var id = $('#fincas9').val()
    var cont=9;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/direccion-fincas.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(direccion_finca){
      $('#direccion_origen9').html(direccion_finca)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  //autorellenado de campos de origen 7--------------------------
  $('#fincas10').on('change', function(){
    var id = $('#fincas10').val()
    var cont=10;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/vista-empacadora.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(empacadora){
      $('#reg_empacadora10').html(empacadora)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  $('#fincas10').on('change', function(){
    var id = $('#fincas10').val()
    var cont=10;
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/direccion-fincas.php',
      data: {'id': id,'cont':cont}
    })
    .done(function(direccion_finca){
      $('#direccion_origen10').html(direccion_finca)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })
   //llenado de destinos--------------------------------------------------

  $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-destinos.php'
  })
  .done(function(destinos){
    $('#destinos').html(destinos)
  })
  .fail(function(){
    alert('Hubo un error al cargar los estados')
  })

  //actualizar de destinos--------------------------------------------------

  $('#actualizar_destino').on('click', function(){

      $.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/vista-destinos.php'
  })
  .done(function(destinos){
    $('#destinos').html(destinos)
  })
  .fail(function(){
    alert('Hubo un error al cargar los estados')
  })

  })

  $('#destinos').on('change', function(){
    var id = $('#destinos').val()
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/campo_direccion_destinos.php',
      data: {'id': id}
    })
    .done(function(direccion_destino){
      $('#direc_destino').html(direccion_destino)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  $('#destinos').on('change', function(){
    var id = $('#destinos').val()
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/campo_ciudad_destinos.php',
      data: {'id': id}
    })
    .done(function(ciudad_destino){
      $('#ciudad_destino').html(ciudad_destino)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

  $('#destinos').on('change', function(){
    var id = $('#destinos').val()
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/campo_pais_destinos.php',
      data: {'id': id}
    })
    .done(function(pais_destino){
      $('#pais_destino').html(pais_destino)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })
       
//agregar campos de productos--------------------------------------------------
$("#add").click(function() {
	    if (contador_envases<10)
         {
         contador_envases++;
         var cad="#datos"+contador_envases;
	     $(cad).show(); //muestro mediante id
	     $("#contador_productos").attr("value",contador_envases);
       $("#contador_fincas").attr("value",contador_envases);
         }
         else
         {
         	alert("Solo puedes agregar 10 productos por certificado")
         }
    });
//eliminar campos de productos--------------------------------------------------
$("#eliminar_producto").click(function() {
      if (contador_envases>1)
         {
         var cad="#datos"+contador_envases;
       $(cad).hide(); 
       contador_envases=contador_envases-1;
       $("#contador_productos").attr("value",contador_envases);
       $("#contador_fincas").attr("value",contador_envases);
         }
         else
         {
          alert("No puedes eliminar más campos de PRODUCTOS")

         }
    });

//agregar campos fincas--------------------------------------------------
$("#addorigen").click(function() {

         if (contador_origen<10)
         {
         contador_origen++;
         var cad="#origen"+contador_origen;
	     $(cad).show(); //muestro mediante id
	     $("#contador_fincas").attr("value",contador_origen);
         }
         else
         {
         	alert("Solo puedes agregar 8 destinos por certificado")
         }   
        
    });
//Eliminar campos fincas--------------------------------------------------
$("#eliminar_origen").click(function() {
      if (contador_origen>1)
         {
         var cad="#origen"+contador_origen;
       $(cad).hide(); 
       contador_origen=contador_origen-1;
       $("#contador_fincas").attr("value",contador_origen);
         }
         else
         {
          alert("No puedes eliminar más campos de ORIGEN")

         }
    });

//REllenar campos de vehículo

$('#vehiculo').on('change', function(){
    var id_vehiculo = $('#vehiculo').val()
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/campo_placas.php',
      data: {'id': id_vehiculo}
    })
    .done(function(placas){
      $('#placas').html(placas)
    })
    .fail(function(){
      alert('Hubo un error al cargar las placas')
    })


    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/campo_modelo.php',
      data: {'id': id_vehiculo}
    })
    .done(function(modelo){
      $('#modelo').html(modelo)
    })
    .fail(function(){
      alert('Hubo un error al cargar el modelo')
    })

  })

//Rellenar campos de conductor

$('#chofer').on('change', function(){
    var id_chofer = $('#chofer').val()
    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/campo_direccion_chofer.php',
      data: {'id': id_chofer}
    })
    .done(function(direccion_chofer){
      $('#direccion_chofer').html(direccion_chofer)
    })
    .fail(function(){
      alert('Hubo un error al cargar la dirección del chofer')
    })
    

    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/campo_estado_chofer.php',
      data: {'id': id_chofer}
    })
    .done(function(estado_chofer){
      $('#estado_chofer2').html(estado_chofer)
    })
    .fail(function(){
      alert('Hubo un error al cargar el estado del Chofer')
    })

    $.ajax({
      type: 'POST',
      url: 'views/combobox-certificado/campo_licencia_chofer.php',
      data: {'id': id_chofer}
    })
    .done(function(licencia_chofer){
      $('#licencia_chofer').html(licencia_chofer)
    })
    .fail(function(){
      alert('Hubo un error al cargar la licencia del Chofer')
    })

  })


//rellenar usuarios de báscula

$.ajax({
    type: 'POST',
    url: 'views/combobox-certificado/usuarios_bascula.php'
  })
  .done(function(usuarios){
    $('#usuarios_de_bascula').html(usuarios)
  })
  .fail(function(){
    alert('Hubo un error al cargar los Usuarios de báscula')
  })


$('#buscar').on('keyup', function(){
    var id = $('#buscar').val()
    $.ajax({
      type: 'POST',
      url: 'views-listas/buscar_certificado.php',
      data: {'id': id}
    })
    .done(function(pais_destino){
      $('#mostrar').html(pais_destino)
      alert(pais_destino)
    })
    .fail(function(){
      alert('Hubo un error al cargar los municipios')
    })
  })

});