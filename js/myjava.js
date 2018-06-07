$(function(){

	$('#bd-desde').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_producto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
	$('#bd-hasta').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_producto_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});
	
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
				$('#formulario')[0].reset();
				$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(3500).hide(200);
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

/*function eliminarProducto(id){
	var url = '../php/elimina_producto.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Producto?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}

function editarProducto(id){
	$('#formulario')[0].reset();
	var url = '../php/edita_producto.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#id-prod').val(id);
				$('#nombre').val(datos[0]);
				$('#tipo').val(datos[1]);
				$('#precio-uni').val(datos[2]);
				$('#precio-dis').val(datos[3]);
				$('#registra-producto').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}*/



function eliminarProducto(id){ 
var url = '../php/elimina_producto.php';
var pregunta = confirm('¿Esta seguro de eliminar este Producto?');
	 if(pregunta==true){ 
		$.ajax({ type:'POST', url:url, data:'id='+id, success: function(registro){
			$('#agrega-registros').html(registro); return false; 
		} 
	    });
		e.preventDefault(); return false; 
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
					$('#id-prod').val(id);
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
