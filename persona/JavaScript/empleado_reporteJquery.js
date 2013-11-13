$(document).ready(function(){
	fn_buscar();
	$("#grilla tbody tr").mouseover(function(){
		$(this).addClass("over");
	}).mouseout(function(){
		$(this).removeClass("over");
	});	
});

function fn_agregar(){		
		var str=$("#form_titular").serialize();
		$.ajax({
			url:'Controladores/controlador_titular.php?',
			data:str,
			type:'post',
			success:function(data){
				jAlert(data,'Dialogo de Alerta');								
			}
		});
	};
function fn_cerrar(){	
 $.ajax({
	beforeSend: function(){                         
    $("#cuerpo").html('<div  style="margin-left:300px;"><img src="Imagen_sistema/loading.gif"/></div>');
  	},
	success: function(){
		$("#cuerpo").load("index_empleado.php");	
	}
	});		
};

function fn_paginar(var_div, url){
	var div = $("#" + var_div);
	$(div).load(url);
}
function fn_eliminar(id_titular){
jConfirm('Desea excluir este Titular?', 'Mensaje Confirmación', function(r) {
	if(r==true){		
		$("#cuerpo").load("Php/exclusion_titular.php", {id_titular: id_titular});		
	}
	});	
}
function fn_verPerfil(id_titular){	
 $.ajax({
	success: function(){
	$("#cuerpo").load("perfil_empleado.php",{id_titular: id_titular});		
	}
	});		
};
function fn_verHistorial(id_titular,nombre1,apellido1){	
 $.ajax({
	beforeSend: function(){                         
    	$("#cuerpo").html('<div style="margin-left:300px;"><img src="../../Imagen_sistema/loading.gif"/></div>');
  	},
	success: function(){
	$("#cuerpo").load("perfil_empleado_2.php",{id_titular: id_titular, nomb: nombre1, ape: apellido1});	
	}
	});		
};
function fn_buscar(){	
	var str = $("#frm_buscar").serialize();
	$.ajax({	
	url: 'listar_reporte_empleado.php',
		type: 'get',
		data: str,					
		success: function(data){
		$("#div_listar").html(data);							 		
		}		
	});
}

function fn_listar_benef(){	
	var str = $("#frm_perfil").serialize();
	$.ajax({	
	url: 'listar_beneficiario.php',
		type: 'get',
		data: str,					
		success: function(data){
		$("#div_listar_beneficiario").html(data);							 		
		}		
	});
}

