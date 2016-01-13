<?
/*
Template Name: visualizar_planificacion_admin_1
*/
?>
<? session_start();?>
<?php get_header(); ?>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
<script src="http://malsup.github.io/jquery.blockUI.js" type="text/javascript"></script>
<script> 	 	 
	function cargar_asignaturas(curso){			
			var curso_sel=curso.value;														
            var url="/soluciones-pedagogicas/consulta-asinaturas-curso";
			$.blockUI.defaults.message = '<h1>Reseteando Indicadores...</h1><br><img src="http://www.elquiweb.net/soluciones-pedagogicas/wp-content/themes/child_twentytwelve/img/loading.gif" />';
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'id_curso': curso_sel },
                success: function(datos){       
                    $('#asignaturas').html(datos);
                }
            });			
	}
	
	function cargar_planificacion(){			
			var tipo_planificacion=tipo.value;														
            var url="/soluciones-pedagogicas/????";
            $.ajax({   
                type: "GET",
                url:url,
                data: { 'tipo_planificacion': tipo_planificacion },
                success: function(datos){       
                    $('#clase_unidad').html(datos);
                }
            });			
	}			       
</script>

<?

$users = get_users( 
		array(  
			'meta_key'     => 'jefe_docente',
			'meta_value'   => $current_user->user_login,
			'posts_per_page' => -1
		) 
);
/*	
echo '<h1>Lista de Docentes</h1>';
foreach($users as $user){
	//$user->ID	
	//$user->display_name
	echo '<a href="">'.$user->first_name.' '.$user->last_name.'</a>';
	echo '<br>';

}*/
?>

<div class="container">
	<div class="row contenedor">
		<div class="span12">
        	<div class="row contenedor_margenes">
            	<div class="span2">                	
                	<font color="white" style="font-size:25px;"><u>Seleccione</u></font>
                </div>
                <div class="span8" style="padding-top:10%">
                	<div class="span2">
                    	<div class="span3">
				            <font class="letras_blanca_normal">Curso</font> 
                        </div> 
                        <div class="span3">
                        	<SELECT class="select_sombra" id="cu_so" name="cu_so" onchange="cargar_asignaturas(this)">
								<option>Seleccione</option>
								<?
								$args = array(    	
						    		'post_type' => 'curso',
									'author' => get_current_user_id(),
									'posts_per_page' => -1			    
								);
								query_posts( $args );
				
								while (have_posts()) : the_post();
									echo '<OPTION VALUE="'.get_the_ID().'">'.get_the_title().'</OPTION>';
								endwhile;		
								?>   
							</SELECT>                       
                        </div> 
                        
                    </div>
                    <div class="span3">
                    	<div class="span3">
                    		<font class="letras_blanca_normal">Asignatura</font> 
	                    </div>
    	                <div class="span3">
        	            	<SELECT class="select_sombra" id="asignaturas" name="asignaturas">
	  							<option>Seleccione</option>
							</SELECT> 
                    	</div> 
                    </div>
                    <div class="span2">
                    	<div class="span2">
                    		<font class="letras_blanca_normal">Tipo de Planificacion</font> 
	                    </div>
    	                <div class="span1">
        	            	<SELECT  class="select_sombra" id="tipo_planificacion" name="tipo_planificacion">
	  							<option>Seleccione</option>
					            <option value="planificacion_clase">Planificacion de Clases</option>
					            <option value="planificacion_anual">Planificacion Anual</option>
							</SELECT>
                    	</div>
                    </div>                   
                    <div class="row">
                    <br /><br />
                    	<div class="span12"><br />
                        	<div class="span1 offset6">
                            	<a class="boton" href="javascript:irSiguiente()">Siguiente</a>
                            </div>
                        
                        </div>
                    </div>
                </div>
			</div>
            <br /><br />
            
		</div>
        
	</div>
</div>            	            

<?php get_sidebar(); ?>
<?php get_footer(); ?>	

<script>                            
function irSiguiente() {
	
	var tipo_planificacion=document.getElementById('tipo_planificacion').value;
	var cu_so=document.getElementById('cu_so').value;
	var asignatura=document.getElementById('asignaturas').value;
	
	if(tipo_planificacion=="Seleccione" || cu_so=="Seleccione" || asignatura=="Seleccione"){
		alert('Debe completar el formulario')
	}else{
		location.href='/soluciones-pedagogicas/seleccion-planificacion?tipo_planificacion='+tipo_planificacion+'&cu_so='+cu_so+'&asignatura='+asignatura;
	}
}                            
</script>