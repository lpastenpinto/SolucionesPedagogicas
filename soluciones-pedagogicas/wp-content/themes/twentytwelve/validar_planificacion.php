<?
if (isset($_POST['boton_validar'])) {
	update_post_meta($_POST['id_planificacion_validar'],'Validado',1);	
}
?>