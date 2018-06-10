$(function(){

	$('#nuevo-proveedor').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-producto').modal({
			show:true,
			backdrop:'static'
		});
	});
	
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = '../php/busca_producto.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
});

function agregaRegistro(){
	var url = '../php/agrega_proveedor.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
				$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(3500).hide(200);
				$('#formulario')[0].reset();
				$('#pro').val('Registro');
				$('#agrega-registros').html(registro);
				return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}

function eliminarProducto(id){ 
var url = '../php/elimina_producto.php';
var pregunta = confirm('¿Esta seguro de eliminar este Producto?');
	 if(pregunta==true){ 
		$.ajax({ type:'POST', url:url, data:'id='+id, success: function(registro){
			$('#agrega-registros').html(registro); return false; 
		} 
	    });
	}
}
 
function editarProducto(id){ 
$('#formulario')[0].reset();
   var url = '../php/edita_producto.php';
		$.ajax({ 
			type:'POST',
			dataType: "json",
			url:url,
			data:'id='+id,
				success: function(valores){
				   // datety datos = eval(valores); 
					$('#reg').hide(); 
					$('#edi').show();
					$('#pro').val('Edicion'); 
					$('#id-prov').val(id);
					$('#rut').val(valores[0]); 
					$('#nombre').val(valores[1]); 
					$('#descrip').val(valores[2]);
					$('#registra-producto').modal({ 
						show:true,
						backdrop:'static' 
					});
				return false;
				} 
	    });
}
