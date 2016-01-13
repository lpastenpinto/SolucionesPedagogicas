<?php
/*
Template Name: Planificacion anual 2
*/
?>
<?php 
//overflow:auto
session_start();
global $wpdb, $post;
// id="cambio_2"

if(!empty($_SESSION['id_cu_so'])){
	$curso=$_SESSION['cu_so'];
	$asignatura=$_SESSION['asignatura'];
	$ano=$_SESSION['ano'];
	$nombre_curso=$_SESSION['nombre_curso'];
	
}
/*if ($_GET['cu_so']=="" && $_GET['asignatura']=="" && $_GET['ano']=="") {
	$curso=$_SESSION['curso'];
	$asignatura=$_SESSION['asignatura'];
	$ano=$_SESSION['ano'];
	$nombre_curso=$_SESSION['nombre_curso'];}*/
else{
	
	$consulta = "SELECT nombre FROM asignaturas WHERE id='".$_GET['asignatura']."'";
	$asignatura= $wpdb->get_var($consulta);
	$nombre_curso=get_post_meta($_GET['cu_so'],'NombreCurso',true);
	$curso= get_the_title($_GET['cu_so']);
	
	//$curso=$_POST['curso_'];
	$_SESSION['id_cu_so']=$_GET['cu_so'];
	$_SESSION['cu_so']=$curso;
	$_SESSION['nombre_curso']=$nombre_curso;
	//$asignatura=$_POST['asignaturas'];
	$_SESSION['id_asignatura']=$_GET['asignatura'];
	$_SESSION['asignatura']=$asignatura;
	
	$ano=$_GET['ano'];
	$_SESSION['ano']=$ano;		
}
$nombre_docente=$_SESSION['nombre_d'];



/*	
$curso=$_POST['curso_'];
$_SESSION['curso']=$curso;
$asignatura=$_POST['asignatura_'];
$_SESSION['asignatura']=$asignatura;
$ano=$_POST['ano_'];
$_SESSION['ano']=$ano;
$nombre_docente=$_SESSION['nombre_d'];*/
?>
<?php get_header(); 
echo '<div>';
?>
<?php		
	//global $current_user;
	//$userid = $current_user->ID;	
	$args = array(    	
    	'post_type' => 'planificacion_anual',
		'author' => get_current_user_id(),
		'meta_key'		=> 'Unidad',
		'orderby'		=> 'meta_value_num',
		'order'			=> 'ASC',
	    'meta_query' => array(
        	array  (
	            'key' => 'Asignatura',
        	    'value'=> $asignatura
	        ),
	        array  (
	            'key' => 'Curso',
        	    'value'=> $curso
	        )	        
	    )
	);
	query_posts( $args );

	//query_posts( 'post_author='.get_current_user_id().'&post_type=planificacion_anual' ); //asignatura &meta_key=Prevision&meta_value=Fonasa    orderby=title&order=ASC
	$ids_planificacion_anual = array();
	$ids_=0;
	while (have_posts()) : the_post();
		
		$ids_planificacion_anual[$ids_]=get_the_ID();		
		$ids_++;
	endwhile;
	//OBTENER IDS PLANIFICACIONES ANUALES 			 		
	$id_planificacion_anual_1=$ids_planificacion_anual[0];
	$id_planificacion_anual_2=$ids_planificacion_anual[1];
	$id_planificacion_anual_3=$ids_planificacion_anual[2];
	$id_planificacion_anual_4=$ids_planificacion_anual[3];

	if(empty($id_planificacion_anual_1)){
	?>	
    <div class="container">
    	<div class="row">
        	<div class="span12">
            
				<small>*Como es primera vez que ingresa, recuerde llenar y luego guardar este formulario aunque no sea la informacion definitiva (luego la puede editar).<br>De lo contrario, si es que no guarda, no podra planificar.</small><br><br>
	        </div>
		</div>            
        <?
	}else{
		?>
       <div class="container"> 
                
        <?
	}
	if(!empty($id_planificacion_anual_1)){
		$nombre_unidad_1=  get_the_title($id_planificacion_anual_1);	
	}else{
		$nombre_unidad_1="";	
	}	
	$semestre_unidad_1 = get_post_meta($id_planificacion_anual_1, 'Semestre', true);
	$semanas_unidad_1= get_post_meta($id_planificacion_anual_1, 'Semana', true);
	$fecha_inicial_1= get_post_meta($id_planificacion_anual_1, 'FechaInicial', true);
	$fecha_final_1= get_post_meta($id_planificacion_anual_1, 'FechaFinal', true);
	$meses_1= get_post_meta($id_planificacion_anual_1, 'Meses', true);
	
	
	if(!empty($id_planificacion_anual_2)){
		$nombre_unidad_2=  get_the_title($id_planificacion_anual_2);	
	}else{
		$nombre_unidad_2="";
	}	
	$semestre_unidad_2 = get_post_meta($id_planificacion_anual_2, 'Semestre', true);	
	$semanas_unidad_2= get_post_meta($id_planificacion_anual_2, 'Semana', true);
	$fecha_inicial_2= get_post_meta($id_planificacion_anual_2, 'FechaInicial', true);
	$fecha_final_2= get_post_meta($id_planificacion_anual_2, 'FechaFinal', true);
	$meses_2= get_post_meta($id_planificacion_anual_2, 'Meses', true);
	
	
	if(!empty($id_planificacion_anual_3)){
		$nombre_unidad_3=  get_the_title($id_planificacion_anual_3);
	}else{
		$nombre_unidad_3="";	
	}	
	$semestre_unidad_3 = get_post_meta($id_planificacion_anual_3, 'Semestre', true);	
	$semanas_unidad_3= get_post_meta($id_planificacion_anual_3, 'Semana', true);
	$fecha_inicial_3= get_post_meta($id_planificacion_anual_3, 'FechaInicial', true);
	$fecha_final_3= get_post_meta($id_planificacion_anual_3, 'FechaFinal', true);
	$meses_3= get_post_meta($id_planificacion_anual_3, 'Meses', true);
	
	
	if(!empty($id_planificacion_anual_4)){
		$nombre_unidad_4=  get_the_title($id_planificacion_anual_4);
	}else{
		$nombre_unidad_4="";	
	}	
	$semestre_unidad_4 = get_post_meta($id_planificacion_anual_4, 'Semestre', true);
	$semanas_unidad_4= get_post_meta($id_planificacion_anual_4, 'Semana', true);
	$fecha_inicial_4= get_post_meta($id_planificacion_anual_4, 'FechaInicial', true);
	$fecha_final_4= get_post_meta($id_planificacion_anual_4, 'FechaFinal', true);
	$meses_4= get_post_meta($id_planificacion_anual_4, 'Meses', true);
	
	
	//if(isset($_POST)){ guardar_2
	include('guardar_planificacion_anual_2.php');

?>
<div class="row contenedor">
	<div class="span12 contenedor_margenes">
    	<div class="row">
        	<div class="span12">
            	<font color="white" style="font-size:15px;"><u>Planificacion de trayecto Anual</u></font>
            </div>
        </div>
        <div class="row">
	        <div class="span12">
            	<font class="texto_azul_titulo"><b>Curso: </b></font><font class="texto_blanco_titulo"><? echo $curso;?></font><br/>
                <font class="texto_azul_titulo"><b>Asignatura: <b></font><font class="texto_blanco_titulo"><? echo $asignatura;?></font><br/>        				
    	    </div>
        </div>
		<div class="row">
	        <div class="span12 contenedor_info_planificacion">
			<br>
		
        	<form role="form" name="form-2" id="form-2" action="" method="post">
			<table class="table table-condensed">
				
					<tr>
						<td>  	
                        	<font class="subtitulo_celeste">Unidad 1</font>
							
						</td>
					</tr>
                    <tr>
						<td>
							<label class="texto_blanco_normal">Semestre</label>
						</td>
						<td>
							<input class="form-control input_con_sombra " type="number" name="semestre_unidad_1" id="semestre_unidad_1" value="<? echo htmlspecialchars($semestre_unidad_1); ?>">
						</td>
					</tr>				
					<tr>
						<td>
							<label class="texto_blanco_normal">Nº de semanas</label>
						</td>
						<td>
							<input class="form-control input_con_sombra " type="number" name="semanas_unidad_1" value="<? echo htmlspecialchars($semanas_unidad_1); ?>">
						</td>
						<td>
							<label class="texto_blanco_normal">Entre</label>
						</td>
						<td>
							<input type="date" name="fecha_inicial_1" id="fecha_inicial_1" class="form-control calendario_i input_con_sombra" step="1" class="MyDate" value="<? echo $fecha_inicial_1; ?>">
						</td>
						<td>
							<label class="texto_blanco_normal">AI</label>
						</td>
						<td>	
							<input type="date" name="fecha_final_1" id="fecha_final_1" step="1" class="form-control MyDate input_con_sombra" value="<? echo $fecha_final_1; ?>">
						</td>
					</tr>
					<tr>
						<td>	
							<label class="texto_blanco_normal">Meses</label>
						</td>
						<td>	
							<input class="form-control input_con_sombra" type="text" name="meses_1" id="meses_1"  value="<? echo $meses_1; ?>" >
						</td>	
						<td>
							<label class="texto_blanco_normal">Nombre Unidad</label>
						</td>
						<td colspan="2">
							<input class="form-control input_con_sombra" style="width:100%;"  type="text" name="nombre_unidad_1" id="nombre_unidad_1" value="<? echo htmlspecialchars($nombre_unidad_1); ?>">
						</td>
                        <td>
                        	<a class="boton" href="javascript:irSiguiente(<? echo $id_planificacion_anual_1; ?>)">Planificar</a>
                        	
                        </td>
					</tr>
			</table>
            
            
            
			<table  class="table table-condensed">
				<br/><br>
	
				<tr>
					<td>
                    	<font class="subtitulo_celeste">Unidad 2</font>  	
						
					</td>
				</tr>
				<tr>
					<td>
						<label class="texto_blanco_normal">Semestre</label>
					</td>
					<td>
						<input class="input_con_sombra" type="number" name="semestre_unidad_2" id="semestre_unidad_2" value="<? echo htmlspecialchars($semestre_unidad_2); ?>">
					</td>
				</tr>
			
				<tr>
					<td>
						<label class="texto_blanco_normal">Nº de semanas </label>
					</td>
					<td>
						<input class="input_con_sombra" type="number"  name="semanas_unidad_2" value="<? echo htmlspecialchars($semanas_unidad_2); ?>">
					</td>
					<td>
						<label class="texto_blanco_normal">Entre </label>
					</td>
					<td >
						<input type="date" name="fecha_inicial_2"  class="MyDate input_con_sombra" value="<? echo $fecha_inicial_2; ?>">
					</td>
					<td >
						<label class="texto_blanco_normal">AI</label>
					</td>
					<td >	
						<input type="date" name="fecha_final_2" class="MyDate input_con_sombra" value="<? echo $fecha_final_2; ?>">
					</td>
				</tr>
				<tr>
					<td >	
						<label class="texto_blanco_normal">Meses</label>
					</td>
					<td >	
						<input class="input_con_sombra" type="text" name="meses_2" id="meses_2"  value="<? echo $meses_2; ?>">
					</td>	
					<td>
						<label class="texto_blanco_normal">Nombre Unidad</label>
					</td>
					<td colspan="2" >
						<input class="input_con_sombra" style="width:100%;" type="text" name="nombre_unidad_2" id="nombre_unidad_2" value="<? echo htmlspecialchars($nombre_unidad_2); ?>">
					</td>
                    <td>
                    	<a class="boton" href="/soluciones-pedagogicas/planificacion-anual-3?id_planificacion=<? echo $id_planificacion_anual_2; ?>">Planificar</a>
                    </td>
				</tr>
			</table>
            
			<table  class="table table-condensed">
				<br><br>

				<tr>
 					<td > 
                    	<font class="subtitulo_celeste">Unidad 3</font> 	
						
					</td>
				</tr>
				<tr>
					<td>
						<label class="texto_blanco_normal">Semestre</label>
					</td>
					<td>
						<input class="input_con_sombra" type="number" name="semestre_unidad_3" id="semestre_unidad_3" value="<? echo htmlspecialchars($semestre_unidad_3); ?>">
					</td>
				</tr>				
				<tr>
					<td>
						<label class="texto_blanco_normal">Nº de semanas</label>
					</td>
					<td>
						<input class="input_con_sombra" type="number"  name="semanas_unidad_3"value="<? echo htmlspecialchars($semanas_unidad_3); ?>">
					</td>
					<td>
						<label class="texto_blanco_normal">Entre</label>
					</td>
					<td>
						<input type="date" name="fecha_inicial_3"  class="MyDate input_con_sombra" value="<? echo $fecha_inicial_3; ?>">
					</td>
					<td>
						<label class="texto_blanco_normal">AI</label>
					</td>
					<td>	
						<input type="date" name="fecha_final_3" class="MyDate input_con_sombra" value="<? echo $fecha_inicial_3; ?>">
					</td>
				</tr>
				<tr>
					<td>	
						<label class="texto_blanco_normal">Meses</label>
					</td>
					<td>	
						<input class="input_con_sombra" type="text" name="meses_3" id="meses_3"  value="<? echo $meses_3; ?>">
					</td>	
					<td>
						<label class="texto_blanco_normal">Nombre Unidad</label>
					</td>
					<td colspan="2" >
						<input class="input_con_sombra" style="width:100%;" type="text" name="nombre_unidad_3" id="nombre_unidad_3"  value="<? echo htmlspecialchars($nombre_unidad_3); ?>">
					</td>
                    <td>
                    	<a class="boton" href="/soluciones-pedagogicas/planificacion-anual-3?id_planificacion=<? echo $id_planificacion_anual_3; ?>">Planificar</a>
                    </td>
				</tr>
			</table>
            
            
			<table class="table table-condensed">
				<br><br><br>

				<tr>
					<td>  	
                    	<font class="subtitulo_celeste">Unidad 4</font>
						
					</td>
				</tr>
				<tr>
					<td >
						<label class="texto_blanco_normal">Semestre</label>
					</td>
					<td >
						<input class="input_con_sombra" type="text" name="semestre_unidad_4" id="semestre_unidad_4" value="<? echo htmlspecialchars($semestre_unidad_4)?>">
					</td>
				</tr>

				<tr>
					<td >
						<label class="texto_blanco_normal">Nº de semanas</label>
					</td>
					<td>
						<input class="input_con_sombra" type="number"  name="semanas_unidad_4" value="<? echo  htmlspecialchars($semanas_unidad_4); ?>">
					</td>
					<td>
						<label class="texto_blanco_normal">Entre</label>
					</td>
					<td>
						<input type="date" name="fecha_inicial_4"   class="MyDate input_con_sombra" value="<? echo $fecha_inicial_4; ?>">
					</td>
					<td >
						<label class="texto_blanco_normal">AI</label>
					</td>
					<td >	
						<input type="date" name="fecha_final_4" class="MyDate input_con_sombra" value="<? echo $fecha_final_4; ?>">
					</td>
				</tr>
				<tr>
					<td>	
						<label class="texto_blanco_normal">Meses</label>
					</td>	
					<td>	
						<input class="input_con_sombra" type="text" name="meses_4" id="meses_4"  value="<? echo $meses_4; ?>">
					</td>	
					<td>
						<label class="texto_blanco_normal">Nombre Unidad</label>
					</td>
					<td colspan="2">
						<input class="input_con_sombra" style="width:100%;" type="text" name="nombre_unidad_4" id="nombre_unidad_4" value="<? echo htmlspecialchars($nombre_unidad_4); ?>">
					</td>
                    <td>
                    	<a class="boton" href="javascript:irSiguiente(<? echo $id_planificacion_anual_4; ?>)">Planificar</a>
                    </td>
				</tr>
			</table>
			
        </div>
        </div>
      
		
		</div>
	</div>
    <div class="row">
    	<div class="span12">
        	<span><font color="#FFFFFF">* llene antes de guardar este formulario, aunque no sea la informacion definitiva (luego la puede editar) de lo contrario no podra planificar</font></span>
        </div>
    </div>
    <div class="row">
    	<div class="span12">
        	<div class="boton_izquierda">
            	
            	<a href="/soluciones-pedagogicas/?page_id=189" class="boton">Volver atras</a>
            </div>
            <div class="boton_derecha">
            	<div> 
               
                	<button class="boton" type="submit" name="guardar_2">Guardar</button>
                </div>
                <br />
                <br />
                <div>
                	<a class="boton" href="/soluciones-pedagogicas/carta-gantt/?cu_so=<? echo $curso;?>&asignatura=<? echo $asignatura;?>&ano=<? echo $ano;?>&docente=<? echo get_current_user_id();?>">Carta Gantt</a>
                </div>
            </div>
        </div>
    </div>


<?
//<a href="/soluciones-pedagogicas/?page_id=127">Volver al menu</a>&nbsp;&nbsp;&nbsp;&nbsp;
?>



</form>


    
</div>

<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('.MyDate').datepicker({        
		monthNames : ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		weekHeader: 'Sm',
		dateFormat: 'dd/mm/yy',
		firstDay: 1,
		closeText: 'Cerrar',
		prevText: '<Ant',
		nextText: 'Sig>',
		currentText: 'Hoy',
		onClose: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
			alert(month);
		} 		
    });
	
});

</script>



<br><br>


<?php 
echo '</div>';	
get_sidebar(); ?>
<?php get_footer(); ?>
<script>                            
function irSiguiente(id_planificacion) {		
	if(typeof(id_planificacion) == "undefined"){
		alert('Debe guardar antes de ir a planificar la unidad')
	}else{
		location.href='/soluciones-pedagogicas/planificacion-anual-3?id_planificacion='+id_planificacion;
	}  
}                            
</script>                                     
                              
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            