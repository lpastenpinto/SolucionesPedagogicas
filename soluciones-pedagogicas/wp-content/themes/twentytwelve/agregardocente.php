<?php
/*
Template Name: Registro docente 2
*/
session_start();
?>                                
<?php
if(isset($_POST["btn"])){	
	global $current_user;
	$current_user=wp_get_current_user(); 
	$rut=$_POST['rut'];  
	$rut_completo=$_POST['rut']; 
	if(validaRut($rut)==true){
		
 		$rut=substr($_POST['rut'], 0, 7);
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$apellido_materno=$_POST['apellido_materno'];
		$user_login=strtolower($nombre.'.'.$apellido.'.'.$apellido_materno);
		
		$datos = array( 	"user_login"  =>$user_login,      // Nombre de usuario para login
		             		"user_pass"   => $rut,  // Contraseña                              
	                      	"user_email"  =>$_POST['email'],     // E-mail
		              		"display_name"=>$nombre.' '.$apellido,      // Nombre a mostrar del usuario en comentarios y mensajes
	                      	"first_name" =>$nombre,    // Nombre del usuario
			      			"last_name"   =>$apellido.' '.$apellido_materno, // Apellidos
			      			"role"        =>"author"
					);
					
		
		$id_usuario = wp_insert_user($datos);
		
		update_usermeta( $id_usuario, 'rut_docente',$rut_completo);
		
		if (is_wp_error($id_usuario)){
			  echo $id_usuario->get_error_message();
		}else{		
						
				update_usermeta( $id_usuario, 'jefe_docente',$current_user->user_login);	
				update_usermeta( $id_usuario, 'id_colegio',get_user_meta($current_user->ID, 'id_colegio',true));					
				echo "<script>";
					echo "alert('Usuario creado con exito.');";					
				echo "</script>";	 
		}
	}else{
		echo "<script>";
		echo "alert('El rut ingresado no es valido');";
		//echo "return false;";
		echo "</script>";	
	}
}	
?> 

<?php get_header(); ?>
<div class="container">
	<div class="row contenedor">
		<div class="span12">
        	<div class="row contenedor_margenes">
            	<div class="span3">                	
                	<font color="white" style="font-size:25px;"><u>Registro Docente</u></font>
                </div>
                <div class="span5" id="contenedor_form_plan_anual">
                 	<form class="form-horizontal" role="form"  id="wp_login_form" action="" method="post">
                    	<div class="form-group">
                        	 <label class="col-lg-4 letras_blanca_normal">Primer Nombre</label>
   							 <div class="col-lg-8">
                             	<input class="form-control input_con_sombra" type="text" name="nombre" id="nombre" required="" value="">                             	
                             </div>
                        </div>
                        <div class="form-group">
                        	 <label class="col-lg-4 letras_blanca_normal">Apellido Paterno</label>
   							 <div class="col-lg-8">
                             	<input type="text" name="apellido" id="apellido" class="form-control input_con_sombra" value="">                             	     	
                             </div>
                        </div>
                        <div class="form-group">
                        	 <label class="col-lg-4 letras_blanca_normal">Apellido Materno</label>
   							 <div class="col-lg-8">
                             	<input type="text" name="apellido_materno" id="apellido_materno" class="form-control input_con_sombra" value="">                             	     	
                             </div>
                        </div>
                        <div class="form-group">
                        	 <label class="col-lg-4 letras_blanca_normal">Rut</label>
   							 <div class="col-lg-8">
                             	<input type="text" name="rut" id="rut" class="form-control input_con_sombra" required="" value="">
                             	                       	     	
                             </div>
                        </div>
                        <div class="form-group">
                        	 <label class="col-lg-4 letras_blanca_normal">Correo Electronico</label>
   							 <div class="col-lg-8">
                             	<input class="form-control input_con_sombra" type="email" name="email" id="email" required="" value="">                             	                      	     	
                             </div>
                        </div>
                        <div class="form-group">
                        	<button class="boton col-lg-offset-6" type="submit" id="btn" name="btn">Guardar</button>                                                 
                        </div>
                    </form>
				</div>
			</div>
		</div>
	</div>
</div>                                                                            

<?php get_sidebar(); ?>
<?php get_footer(); ?>
<?
function validaRut($rut){
    if(strpos($rut,"-")==false){
        $RUT[0] = substr($rut, 0, -1);
        $RUT[1] = substr($rut, -1);
    }else{
        $RUT = explode("-", trim($rut));
    }
    $elRut = str_replace(".", "", trim($RUT[0]));
    $factor = 2;
    for($i = strlen($elRut)-1; $i >= 0; $i--):
        $factor = $factor > 7 ? 2 : $factor;
        $suma += $elRut{$i}*$factor++;
    endfor;
    $resto = $suma % 11;
    $dv = 11 - $resto;
    if($dv == 11){
        $dv=0;
    }else if($dv == 10){
        $dv="k";
    }else{
        $dv=$dv;
    }
   if($dv == trim(strtolower($RUT[1]))){
       return true;
   }else{
       return false;
   }
}
?>                          
                            
                            
                            
                            
                            