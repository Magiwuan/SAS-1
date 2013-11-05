// JavaScript Document
$(document).ready(function(){
   fn_listar_proveedor();
     $("#grilla tbody tr").mouseover(function(){
	$(this).addClass("over");
     }).mouseout(function(){
	$(this).removeClass("over");
     });
});
function fn_agregar(){		
 var str = $("#form_proveedor").serialize();
  $.ajax({
   url: '../../Controladores/controlador_proveedor.php',
   data: str,
   type: 'post',
   success: function(data){
	     jAlert(data);
          }
  });
};

function fn_cerrar(){
	$("#cuerpo").load("../../Php/proveedor/index_proveedor.php");
};

function fn_agregar_proveedor(){
	$("#cuerpo").load("../../Php/proveedor/agregar_proveedor.php", function(){
	});
};

function fn_modificar(id_proveedor){
	$("#cuerpo").load("../../Php/proveedor/modificar_proveedor.php", {id_proveedor: id_proveedor}, function(){
	});
};

function fn_paginar(var_div, url){
	var div = $("#" + var_div);
	$(div).load(url);
	/*
	div.fadeOut("fast", function(){
		$(div).load(url, function(){
			$(div).fadeIn("fast");
		});
	});
	*/
}

function fn_eliminar(id_proveedor){
	var respuesta = confirm("Desea eliminar a este Proveedor?");
	if (respuesta){
		$.ajax({
			url: '../../Php/proveedor/eliminar_proveedor.php',
			data: 'id_proveedor=' + id_proveedor,
			type: 'post',
			success: function(data){
				if(data!="")
				alert(data);
				fn_listar_proveedor()
			}
		});
	}
}

function fn_listar_proveedor(){
	var str = $("#frm_buscar_proveedor").serialize();
	$.ajax({
		url: '../../Php/proveedor/listar_proveedor.php',
		type: 'get',
		data: str,
		beforeSend: function(){ 
		$("#div_listar_proveedor").html('<div  style="margin-left:300px;"><img src="../../Imagen_sistema/loading.gif"/></div>');		
		},
		success: function(data){		
			$("#div_listar_proveedor").html(data);		
			
		}
	});

}

