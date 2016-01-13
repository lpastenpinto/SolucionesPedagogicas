<?
/*
Template Name: Perfil
*/
session_start();
$user_id = get_current_user_id();

if(isset($_POST['btn'])){
	
	$nombre=$_POST['nombre'];
	$apellido=$_POST['apellido'];
	$apellido_materno=$_POST['apellido_materno'];
	$nueva_contrasena=$_POST['contrasena'];
	$nueva_contrasena_=$_POST['contrasena_'];
	$email=$_POST['email'];
	
	$mensaje="";
	if((strcmp($nombre,"")!== 0 && strcmp($apellido,"")== 0) ||(strcmp($nombre,"")== 0 && strcmp($apellido,"")!== 0) ){
		
		$mensaje.="No se puede cambiar solo nombre o apellido. Debe completar ambos.";
	
	}else if((strcmp($nombre,"")!== 0 && strcmp($apellido,"")!== 0 && strcmp($apellido_materno,"")!== 0) ){
		$user_login=strtolower($nombre.'.'.$apellido.'.'.$apellido_materno);		
		update_user_meta( $user_id,'user_login', $user_login );
		update_user_meta( $user_id,'first_name', $nombre );
		update_user_meta( $user_id,'last_name', $apellido );	
		update_user_meta( $user_id,'display_name', $nombre.' '.$apellido );					
	}
		
	if(strcmp($nueva_contrasena,"")!== 0 ){		
			if(strcmp($nueva_contrasena,$nueva_contrasena_)!== 0){
				$mensaje.="Imposible cambiar contrasenas. La repeticion de constrasenas no corresponde.";
				
			}else{
				wp_set_password( $nueva_contrasena, $user_id );
				$mensaje.="Contrasena cambiada con exito.";
			}					
	}
	
	if(strcmp($email,"")!== 0 ){
		update_user_meta( $user_id,'user_email', $email );
		$mensaje.="Email cambiado con exito.";
	}	
	
	
	 if(!empty($_FILES['wp_custom_attachment']['name'])) {
                 
        			$supported_types = array('image/jpeg', 'image/jpg', 'image/png');                
        			$arr_file_type = wp_check_filetype(basename($_FILES['wp_custom_attachment']['name']));
       				$uploaded_type = $arr_file_type['type'];                
       				
       				if(in_array($uploaded_type, $supported_types)) {
            
            				$upload = wp_upload_bits($_FILES['wp_custom_attachment']['name'], null, file_get_contents($_FILES['wp_custom_attachment']['tmp_name']));     
            				if(isset($upload['error']) && $upload['error'] != 0) {
                				wp_die('Hubo un error al subir el archivo. El error es: ' . $upload['error']);
            				} else {
								
								$id_colegio=esc_attr( get_the_author_meta( 'id_colegio', $user_id ) );
                				add_post_meta($id_colegio, 'wp_custom_attachment', $upload);
                				update_post_meta($id_colegio, 'wp_custom_attachment', $upload);
								$mensaje.="Logo Institucional cambiada con exito.";     
            				} 
 
        			} else {
           				 wp_die("La foto del doctor no esta en el formato correcto. Debe ser .jpeg, .jpg o .png. Intente de nuevo.");
        			} 
         
    }	
	
	
	
	
	if(strcmp($mensaje,"")!== 0){
		
		echo "<script>";
			echo "alert('".$mensaje."');";	
		echo "</script>";			
	}
}


get_header();

?>
<div class="container">
	<div class="row contenedor">
		<div class="span12">
        	<div class="row contenedor_margenes">
            	<div class="span4">                	
                	<font color="white" style="font-size:25px;"><u>Modificar Informacion</u></font><br />
                    <small style="color:#FFF">*Recuerde que si cambia el nombre o alguno de los apellidos, debe cambiar Nombre, Apellido Paterno y Apellido Materno.De lo contrario sera imposible loguearse<br />*Si cambia el nombre o alguno de los apellidos, su nuevo usuario sera nombre.apellido.apellido_materno (todo con minuscula)</small>
                   
                </div>
                 <div class="span5" id="contenedor_form_plan_anual">
                 	<form class="form-horizontal" role="form" name="formulario" action="" method="post" enctype="multipart/form-data">
                    	<div class="form-group">
                        	 <label class="col-lg-4 letras_form_plan_anual">Primer Nombre</label>
   							 <div class="col-lg-8">
                             		<input class="form-control input_con_sombra" type="text" name="nombre" id="nombre" class="text"  value="">
                             </div>
                        </div>                                                   
                        
                        <div class="form-group">
                        	 <label class="col-lg-4 letras_form_plan_anual">Apellido Paterno</label>
   							 <div class="col-lg-8">                             						
                             		<input class="form-control input_con_sombra" type="text" name="apellido" id="apellido" class="text" value=""> 
                             </div>
                        </div>
                                                                                  
                        <div class="form-group">
                        	 <label class="col-lg-4 letras_form_plan_anual">Apellido Materno</label>
   							 <div class="col-lg-8">                             		
                                    <input class="form-control input_con_sombra" type="text" name="apellido_materno" id="apellido_materno" class="text" value="">
                             </div>
                        </div>
                        
                        <div class="form-group">
                        	 <label class="col-lg-4 letras_form_plan_anual">Nueva Contraseña</label>
   							 <div class="col-lg-8">                             		
                                    <input class="form-control input_con_sombra" type="password" name="contrasena" id="contrasena" class="text"  value="">
                             </div>
                        </div>
                        
                        <div class="form-group">
                        	 <label class="col-lg-4 letras_form_plan_anual">Repetir Nueva Contraseña</label>
   							 <div class="col-lg-8">                             		
                                    <input class="form-control input_con_sombra" type="password" name="contrasena_" id="contrasena_" class="text"  value="">
                             </div>
                        </div>
                        
                        <div class="form-group">
                        	 <label class="col-lg-4 letras_form_plan_anual">Correo Electronico</label>
   							 <div class="col-lg-8">                             		
                                    <input class="form-control input_con_sombra" type="email" name="email" id="email" class="text"  value="">
                             </div>
                        </div>
                        <?
						if(current_user_can( 'manage_options' )){
						?>
                        <div class="form-group">
                        	 <label class="col-lg-4 letras_form_plan_anual">Correo Electronico</label>
   							 <div class="col-lg-8">                             		
                                    <input class="form-control input_con_sombra" type="email" name="email" id="email" class="text"  value="">
                             </div>
                        </div>
                        <?
						}
						?>
	                 
				</div>
			</div>
		</div>
	</div>
    <div class="row">
    	<div class="span12">
        	<div style="float:left;">
            	<a href="/soluciones-pedagogicas" class="boton">Volver al Menu</a>
            </div>
            <div style="float:right;">
            	<button class="boton" type="submit" id="btn" name="btn">Guardar</button>
            </div>
        </div>    
    </div>
</div>                                        	                     
</form>

<?php get_footer(); 

//http://www.paulund.co.uk/add-custom-user-profile-fields
?>
<script>
function validar(){
	
	var clave1 = document.formulario.new_contrasena.value; 
   	var clave2 = document.formulario.new_contrasena_.value;
	
	var nombre = document.formulario.nombre.value; 
   	var apellido = document.formulario.apellido.value;
	
	if (clave1 !== clave2){		 
      	alert("La nueva contraseña no coincide con su repeticion. Intente de nuevo"); 		
		return false;
	}
	if ((nombre=="" && apellido!=="")||(nombre!=="" && apellido=="")){ 	
      	alert("Debe tener nombre y apellido completos.\nImposible Cambiar solo uno"); 
		return false;
	}
	
	//alert("Las dos claves son iguales...\nRealizaríamos las acciones del caso positivo"); 	
}

</script>