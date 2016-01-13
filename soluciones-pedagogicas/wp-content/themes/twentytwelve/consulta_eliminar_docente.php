<?
/*
Template Name: consulta_eliminar_docente
*/
global $wpdb,$posts;
$id_docente=$_GET['id_docente'];
echo "<script>";
	echo "alert('".$id_docente."');";
	echo "</script>";
try{
	require_once( ABSPATH . 'wp-admin/includes/user.php' );
	wp_delete_user( $id_docente );
	$wpdb->query( 
		$wpdb->prepare( 
			"
        	 DELETE FROM asignaturas_docentes
			 WHERE post_id = ".$id_docente."			 
			"	        
        )
	);			
	exit();
	 	 
}catch(Exception $e){
	echo "<script>";
	echo "alert('".$e."');";
	echo "</script>";
}
?>