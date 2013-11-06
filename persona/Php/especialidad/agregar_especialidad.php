<?php session_start(); //Funcion que permite trabajar con sesiones
if(empty($_SESSION["login"])) 
{
	header("Location: ../usuario/denied.php");
}?><!DOCTYPE HTML>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="../../Css/estilo2.css" />  
    <link rel="stylesheet" type="text/css" href="../../Css/estilo.css" />  
    <link href="../../Css/PHPPaging.lib.css" rel="stylesheet" type="text/css" /> 	
	<link href="../../JavaScript/jquery.alerts.css" rel="stylesheet" type="text/css" />	   	
	<script language="javascript" type="text/javascript" src="../../JavaScript/jquery-1.4.2.min.js"></script>
   	<script language="javascript" type="text/javascript" src="../../JavaScript/especialidad_jquery.js"></script>
    <script language="javascript" type="text/javascript" src="../../JavaScript/especialidad.js"></script>
    <script language="javascript" type="text/javascript" src="../../JavaScript/jquery.alerts.js"></script>       
  </head> 
<script language="javascript" type="text/javascript" >	  
	  $(document).ready(function(){
		limpiar_form();
    	$('#nuevo').click(function(){
		$('#agregar').removeClass('btn_guardar_desact').addClass('btn_act');
		$('#agregar').attr('disabled', false);
		$('#nuevo').removeClass('btn_act').addClass('btn_guardar_desact');
		$('#nuevo').attr('disabled', true);
		
		$('#nombre').attr('disabled', false);
    });	
     $('#agregar').click(function(){
		if(valida()){	
		fn_agregar();			
		$('#nuevo').removeClass('btn_guardar_desact').addClass('btn_act');
		$('#nuevo').attr('disabled', false);
		$('#agregar').removeClass('btn_act').addClass('btn_guardar_desact');
		$('#agregar').attr('disabled', true);
		
		$('#nombre').attr('disabled', true);			
		}
    });
    });
function limpiar_form(ele) {
   $(ele).find('input').each(function() {
      switch(this.type){
         case 'text':
				 $(this).val('');
               	 break;
      }
   }); 			 
}
</script> 
<style type="text/css">
.btn_act{height: 23px; background-color: #f5f5f0; border-bottom: 1px solid #09F; border-right:1px solid #09F; border-top:0px; border-left:0px; font-size: 13px;
  color:black; padding-left: 20px; background-repeat: no-repeat; cursor:hand; cursor:pointer; margin-left:5px; margin-right:5px; outline-width:0px; background-image: url(../../Imagen_sistema/cancelar.jpg);
}.btn_nuevo_act_img{background-image: url(../../Imagen_sistema/nuevo.jpg);}.btn_cancelar_act_img{margin: auto; background-repeat: no-repeat; cursor:hand; cursor:pointer; height: 21px;	 width: 22px; border: 0px;
background-image: url(../../Imagen_sistema/cancelar.jpg);}.btn_guardar_act_img{background-image: url(../../Imagen_sistema/guardar.jpg);}.btn_act:hover{height: 23px; 
  background-color: #f5f5f0; border-bottom: 1px solid #0F0; border-right:1px solid #0F0; border-top:0px; border-left:0px; font-size: 13px; color:black;
  padding-left: 20px; background-repeat: no-repeat; cursor:hand; cursor:pointer; margin-left:5px; margin-right:5px; outline-width:0px;}.btn_guardar_desact{
  height: 23px; background-color: #f5f5f0; border-bottom: 1px solid #999; border-right:1px solid #999; border-top:0px; border-left:0px; font-size: 13px;
  color:#CCC; padding-left: 20px; background-repeat: no-repeat; cursor:hand; cursor:pointer; margin-left:5px; margin-right:5px; outline-width:0px;}/*.btn_guardar_desact_img{
  background-image: url(Imagen_sistema/guardar_desac.jpg);}*/.btn_guardar_desact:hover{ height: 23px; background-color: #f5f5f0; border-bottom: 1px solid #333;
  border-right:1px solid #333; border-top:0px; border-left:0px; font-size: 13px; color:#CCC; padding-left: 20px; background-repeat: no-repeat; cursor:hand; 
  cursor:pointer; margin-left:5px; margin-right:5px; outline-width:0px;}
  </style>    
<body>
<div id="cuerpo">
<form action=""   method="post" id="form_especialidad" name="form_especialidad">
 <table width="696" height="25" border="0" cellpadding="0" cellspacing="0">
  <tr>
  <td width="684"><h1>Agregando Especialidad</h1></td>
   <td valign="top"><input name="cancelar" type="button" id="cancelar" class='btn_cancelar_act_img' onclick="location.href='../../../html/blanco.html'" /></td>
  </tr>
  </table>
<fieldset>  
 <legend></legend>
  <table width="386" height="69">
  <tbody>
   <tr>
   <td width="9" height="63"><input name="ope" type="hidden" id="ope" value="I" hidden="hidden" /></td>
   <td width="79">Nombre:</td>
   <td width="341" ><input name="nombre" type="text" disabled="disabled" class="required" id="nombre" size="50" /></td>
 </tr> 
 </tbody>
 <tfoot> 
 </tfoot>
 </table>    
</fieldset>        
 <table width="686" border="0">
 <tr>
 <td width="260" height="26">&nbsp;</td>
  <td width="95"><input name="nuevo" type="button" id="nuevo" value="  Nuevo" class='btn_act btn_nuevo_act_img' /></td>
      <td width="100"><input name="agregar" type="submit"  class='btn_guardar_desact btn_guardar_act_img' disabled="disabled" id="agregar" onClick="if(!valida()){return false};" value=" Agregar" /></td>
  <td width="213">&nbsp;</td>
 </tr>
</table>
</tr>
</table>      
<hr />
<div id="div_listar_especialidad"></div>
</form>    
</div>
</body>
</html>
