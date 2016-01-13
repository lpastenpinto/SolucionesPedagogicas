<?php
/*
Template Name: cargar_base_curricular
*/	
	session_start();

if (isset($_POST['guardar'])) {
	
  	$palabras_claves = $_POST['palabrasClaves'];
  	$conocimientos = $_POST['conocimientos'];
  	$actitudes = $_POST['actitudes'];
  	$habilidades = $_POST['habilidades'];
    	
	if(empty($_SESSION['id_base_curricular'])){
		$base_curricular = array(		
  				'post_title'    => 'Base curricular:'.$_SESSION['curso'].'/'.$_SESSION['asignatura'].'/'.$_SESSION['unidad'],
	  			'post_content'  => '',
	  			'post_type'	=> 'base_curricular',
 				'post_status'   => 'publish',
				'post_author'   => get_current_user_id(),
				'post_category' => array(8,39)
			);
		$_SESSION['id_base_curricular']=wp_insert_post( $base_curricular );	
		update_post_meta( $_SESSION['id_base_curricular'], 'Unidad_', $_SESSION['unidad'] );
		update_post_meta( $_SESSION['id_base_curricular'], 'Curso_', $_SESSION['curso'] );
		update_post_meta( $_SESSION['id_base_curricular'], 'Asignatura_', $_SESSION['asignatura'] );

		
	}
  	update_post_meta( $_SESSION['id_base_curricular'], 'Palabra_Clave', $palabras_claves );
  	update_post_meta( $_SESSION['id_base_curricular'], 'Conocimiento_', $conocimientos );
  	update_post_meta( $_SESSION['id_base_curricular'], 'Actitud_', $actitudes );
  	update_post_meta( $_SESSION['id_base_curricular'], 'Habilidad_', $habilidades );
	
	$objetivos=$_POST["objetivos"];
	$total_objetivos=count($objetivos);			 
	$obj = array();		
	for($i=0;$i<$total_objetivos;$i++){								
				if(!$objetivos[$i]==""){					
					$indicadores_objetivo=$_POST["indicadores_objetivo_".($i+1).""];
					$total_indicadores_objetivos=count($indicadores_objetivo);
					$obj['objetivo'.$i]['descripcion_objetivo']=$objetivos[$i]; 	
					for($x=0;$x<$total_indicadores_objetivos;$x++){						
						//echo $indicadores_objetivo[$x];	
						if(!$indicadores_objetivo[$x]==""){
							$obj['objetivo'.$i]['indicador'.$x]=$indicadores_objetivo[$x]; 
						}	
					}
				}
	}
	
	 update_post_meta( $_SESSION['id_base_curricular'], 'Objetivo_', $obj);
	 
	 $objetivos_wp= get_post_meta($_SESSION['id_base_curricular'], 'Objetivo_');	
	 $palabras_claves_wp= get_post_meta($_SESSION['id_base_curricular'], 'Palabra_Clave',true);
	 $conocimientos_wp= get_post_meta($_SESSION['id_base_curricular'], 'Conocimiento_',true);
	 $actitudes_wp= get_post_meta($_SESSION['id_base_curricular'], 'Actitud_',true);
	 $habilidades_wp= get_post_meta($_SESSION['id_base_curricular'], 'Habilidad_',true);
}else{
	
	$unidad=$_GET['unidad'];
	$_SESSION['unidad']=$unidad;
		
	$curso=get_the_title($_GET['cu_so']);
	$_SESSION['curso']=$curso;
	
	$asignatura=$_GET['asignatura'];
	$_SESSION['asignatura']=$asignatura;
   
	$args = array(    	
    	'post_type' => 'base_curricular',		
		'meta_query' => array(
        	array  (
	            'key' => 'Asignatura_',
        	    'value'=> $asignatura
	        ),
	        array  (
	            'key' => 'Curso_',
        	    'value'=> $curso
	        ),
			array  (
	            'key' => 'Unidad_',
        	    'value'=> $unidad
	        )	        
	    )
	);
	query_posts( $args );
		
	while (have_posts()) : the_post();
		$_SESSION['id_base_curricular']=get_the_ID();				
	endwhile;	
	
}

	 get_header();
	 $objetivos_wp= get_post_meta($_SESSION['id_base_curricular'], 'Objetivo_');	
	 $palabras_claves_wp= get_post_meta($_SESSION['id_base_curricular'], 'Palabra_Clave',true);
	 $conocimientos_wp= get_post_meta($_SESSION['id_base_curricular'], 'Conocimiento_',true);
	 $actitudes_wp= get_post_meta($_SESSION['id_base_curricular'], 'Actitud_',true);
	 $habilidades_wp= get_post_meta($_SESSION['id_base_curricular'], 'Habilidad_',true);	
	 	 	 
?>  	  	         
<script src='http://code.jquery.com/jquery-1.7.1.js'></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script> 
<script>
 $(document).ready(function() {
// INICIO PALABRA CLAVE
    var MaxInputs       = 1000; //Número Maximo de Campos
    var contenedor      = $("#contenedor"); //ID del contenedor
    var AddButton       = $("#agregarCampo"); //ID del Botón Agregar
    //var x = número de campos existentes en el contenedor
    var x = $("#contenedor div").length + 1;
    var FieldCount = x-1; //para el seguimiento de los campos
    $(AddButton).click(function (e) {
        if(x <= MaxInputs) //max input box allowed
        {
            FieldCount++;
            //agregar campo
            $(contenedor).append('<div><textarea rows="6" type="text" name="palabrasClaves[]" id="palabra_clave_'+ FieldCount +'" placeholder="Palabras Clave '+ FieldCount +'"></textarea><a href="#" class="eliminar">&times;</a></div>');
            x++; //text box increment
        }
        return false;
    });

    $("body").on("click",".eliminar", function(e){ //click en eliminar campo
        if( x > 1 ) {
            $(this).parent('div').remove(); //eliminar el campo
            x--;
        }
        return false;
    });
//FIN PALABRA CLAVE
//INICIO CONOCIMIENTOS
    var MaxInputs2       = 1000; 
    var contenedor2      = $("#contenedor2"); 
    var AddButton2       = $("#agregarCampo2");     
    var x2 = $("#contenedor2 div").length + 1;
    var FieldCount2 = x2-1; 
			    $(AddButton2).click(function (e) {
			        if(x2 <= MaxInputs2) 
			        {
			            FieldCount2++;            
			            $(contenedor2).append('<div><textarea rows="6" type="text" name="conocimientos[]" id="conocimiento_'+ FieldCount2 +'" placeholder="Conocimientos '+ FieldCount2 +'"></textarea><a href="#" class="eliminar2">&times;</a></div>');
			            x2++; 
			        }
			        return false;
			    });
			    $("body").on("click",".eliminar2", function(e){ 
			        if( x2 > 1 ) {
			            $(this).parent('div').remove(); 
			            x2--;
			        }
			        return false;
			    });
//FIN CONOCIMIENTOS
//INICIO ACTITUDES
    var MaxInputs3       = 1000; 
    var contenedor3      = $("#contenedor3"); 
    var AddButton3       = $("#agregarCampo3");     
    var x3 = $("#contenedor3 div").length + 1;
    var FieldCount3 = x3-1; 
			    $(AddButton3).click(function (e) {
			        if(x3 <= MaxInputs3) 
			        {
			            FieldCount3++;            
			            $(contenedor3).append('<div><textarea rows="6" type="text" name="actitudes[]" id="actitud_'+ FieldCount3 +'" placeholder="Actitudes '+ FieldCount3 +'"></textarea><a href="#" class="eliminar3">&times;</a></div>');
			            x3++; 
			        }
			        return false;
			    });
			    $("body").on("click",".eliminar3", function(e){ 
			        if( x3 > 1 ) {
			            $(this).parent('div').remove(); 
			            x3--;
			        }
			        return false;
			    });
//FIN ACTITUDES
//INICIO HABILIDADES
    var MaxInputs4       = 1000; 
    var contenedor4      = $("#contenedor4"); 
    var AddButton4       = $("#agregarCampo4");     
    var x4 = $("#contenedor4 div").length + 1;
    var FieldCount4 = x4-1; 
			    $(AddButton4).click(function (e) {
			        if(x4 <= MaxInputs4) 
			        {
			            FieldCount4++;            
			            $(contenedor4).append('<div><textarea rows="6" type="text" name="habilidades[]" id="habilidad_'+ FieldCount4 +'" placeholder="Habilidades '+ FieldCount4 +'"></textarea><a href="#" class="eliminar4">&times;</a></div>');
			            x4++; 
			        }
			        return false;
			    });
			    $("body").on("click",".eliminar4", function(e){ 
			        if( x4 > 1 ) {
			            $(this).parent('div').remove(); 
			            x4--;
			        }
			        return false;
			    });
//FIN HABILIDADES
//INICIO OBJETIVOS
	var cantidad_objetivos=0;
    var MaxInputs5       = 1000; 
    var contenedorObjetivos     = $("#contenedorObjetivos"); 
    var AddButton5       = $("#agregarCampo5");     
    var x5 = $("#contenedor5").length + 1;
    var FieldCount5 = x5-1; 
			    $(AddButton5).click(function (e) {
			        if(x5 <= MaxInputs5) 
			        {
			            FieldCount5++;            
						var objetivos=document.getElementsByName("objetivos[]");              
						cantidad_objetivos=objetivos.length+1;												
						
						$(contenedorObjetivos).append('<tr><td  style="border:1px solid" ><p><i>Objetivos :</i></p><div id="contenedor5"><div class="added"><textarea rows="6" type="text" name="objetivos[]" id="objetivo_'+cantidad_objetivos+'" placeholder="Objetivos 1"></textarea><a href="#" class="eliminar5">&times;</a></div></div></td><td  style="border:1px solid" ><p><i>Indicadores :</i></p><a id="btn_agregar_indicadores" name="'+cantidad_objetivos+'" class="btn-btn-info btn_agregar_indicador" href="#">Agregar +</a><div id="contenedorIndicadores_'+cantidad_objetivos+'"><div class="added"><textarea rows="6" type="text" name="indicadores_objetivo_'+cantidad_objetivos+'[]" id="indicador_'+cantidad_objetivos+'_1" placeholder="Indicadores 1"></textarea><a href="#" class="eliminar6">&times;</a></div></div></td></tr>');
						
											 	
									           
			        }
			        return false;
			    });
			    $("body").on("click",".eliminar5", function(e){ 
			        
						$(this).closest('tr').remove(); 
			            $(this).parent('div').remove(); 
			        
			        return false;
			    });
//FIN OBJETIVOS
//INICIO INDICADORES
    var MaxInputs6       = 1000; 
   
    var AddButton6       = $("#btn_agregar_indicadores");     
    var x6;
    var FieldCount6;
	
			      $("body").on("click",".btn_agregar_indicador", function(e){
					var x6 = $('#contenedorIndicadores_'+this.name+' div').length + 1;
    				var FieldCount6 = x6-1; 
			        if(x6 <= MaxInputs6) 
			        {	var contenedorIndicadores = $('#contenedorIndicadores_'+this.name); 						
			            FieldCount6++; 												
						var indicadores_objetivos=document.getElementsByName('indicadores_objetivo_'+this.name+'[]');              							var cantidad_indicadores_objetivos=indicadores_objetivos.length+1;	
						        
			            $(contenedorIndicadores).append('<div><textarea rows="6" type="text" name="indicadores_objetivo_'+this.name+'[]" id=" indicador_'+this.name+'_'+cantidad_indicadores_objetivos+'" placeholder="Indicadores '+ FieldCount6 +'"></textarea><a href="#" class="eliminar6">&times;</a></div>');
			            x6++; 
			        }
			        return false;
			    });
			    $("body").on("click",".eliminar6", function(e){ 					
			        
			            $(this).parent('div').remove(); 
			           
			        
			        return false;
			    });
//FIN INDICADORES
});
</script> 
<?	echo 'Base Curricular <br>';
	echo 'Asignatura: '.$_SESSION['asignatura'].'<br>';
	echo 'Curso: '.$_SESSION['curso'].'<br>';
	echo 'Unidad: '.$_SESSION['unidad'].'<br>';
?> 
<form id="formulario" name="formulario" action=""  method="post">      
<table>
		<tr>
	    <td  style="border:1px solid"  colspan="2">
	    	<p><i>Palabras Clave :</i></p>
		  <a id="agregarCampo" class="btn-btn-info" href="#">Agregar Palabra</a>
	       <div id="contenedor">
           		<?
                if(!empty($palabras_claves_wp)){
					foreach($palabras_claves_wp as $palabra){
							?>
                            <div class="added">
		          				<textarea rows="6" type="text" name="palabrasClaves[]" ><? echo $palabra; ?></textarea><a href="#" class="eliminar">&times;</a>
		     				 </div>
                            
							<?
					}				
				}else{
				?>
		       <div class="added">
		          <textarea rows="6" type="text" name="palabrasClaves[]" id="palabra_clave_1" placeholder="Palabras Clave 1"></textarea><a href="#" class="eliminar">&times;</a>
		      </div>
              <? } ?>
	      </div>
	    </td>
	</tr>
	<tr>
		<td  style="border:1px solid"  colspan="2">
	    		<p><i>Conocimientos :</i></p>
		  		<a id="agregarCampo2" class="btn-btn-info" href="#">Agregar Conocimiento</a>
	      		 <div id="contenedor2">
                 <?
                 	if(!empty($conocimientos_wp)){
						foreach($conocimientos_wp as $conocimiento){
							?>
                            <div class="added">
		        				 <textarea rows="6" type="text" name="conocimientos[]"><? echo $conocimiento; ?></textarea><a href="#" class="eliminar2">&times;</a>
		      				</div>
                            
                            <?						
						}
					}else{				 
				 ?>
		       <div class="added">
		          <textarea rows="6" type="text" name="conocimientos[]" id="conocimiento_1" placeholder="Conocimientos 1"></textarea><a href="#" class="eliminar2">&times;</a>
		      </div>
              	<? } ?>
	      </div>
		</td>		
	</tr>	
	<tr>
		<td  style="border:1px solid"  colspan="2">
	    		<p><i>Actitudes :</i></p>
		  		<a id="agregarCampo3" class="btn-btn-info" href="#">Agregar Actitud</a>
	      		 <div id="contenedor3">
                 <?
				 	if(!empty($actitudes_wp)){
						foreach($actitudes_wp as $actitud){
							?>
								<div class="added">
		          						<textarea rows="6" type="text" name="actitudes[]"><? echo $actitud; ?></textarea><a href="#" class="eliminar3">&times;</a>
		     					</div>							
							<?
						}				
					}else{				 
                 ?>
		       <div class="added">
		          <textarea rows="6" type="text" name="actitudes[]" id="actitud_1" placeholder="Actitudes 1"></textarea><a href="#" class="eliminar3">&times;</a>
		      </div>
              	<? } ?>
	      </div>
		</td>		
	</tr>
	<tr>
		<td  style="border:1px solid"  colspan="2">
	    		<p><i>Habilidades :</i></p>
		  		<a id="agregarCampo4" class="btn-btn-info" href="#">Agregar Habilidad</a>
	      		 <div id="contenedor4">
                 <?
                 	if(!empty($habilidades_wp)){
						foreach($habilidades_wp as $habilidad){
							?>
							<div class="added">
					        	  <textarea rows="6" type="text" name="habilidades[]" ><? echo $habilidad; ?></textarea><a href="#" class="eliminar4">&times;</a>
		    				</div>
							
							<?
						}	
					}else{     
				 ?>
		       <div class="added">
		          <textarea rows="6" type="text" name="habilidades[]" id="habilidad_1" placeholder="Habilidades 1"></textarea><a href="#" class="eliminar4">&times;</a>
		      </div>
             	 <? } ?>
	      </div>
		</td>		
	</tr>
	       
    <?
     $cantidad_objetivos=count($objetivos_wp[0]);
	 if($cantidad_objetivos>0){		
    	 for($i=0;$i<$cantidad_objetivos;$i++){
			 
			// echo $objetivos_wp[0]['objetivo'.$i]['descripcion_objetivo'];
			?>
           <tr id="contenedorObjetivos">  
			 <td  style="border:1px solid" ><p><i>Objetivos :</i></p>
             <?
             if($i==0){
			 ?>
		  		<a id="agregarCampo5" class="btn-btn-info" href="#">Agregar +</a>
             <? } ?>  
	      		<div id="contenedor5">
		       		<div class="added">
		          		<textarea rows="6" type="text" name="objetivos[]"><? echo $objetivos_wp[0]['objetivo'.$i]['descripcion_objetivo']; ?></textarea><a href="#" class="eliminar5">&times;</a>
		      		</div>
	      		</div>
	  	     </td>	
			 <td  style="border:1px solid" ><p><i>Indicadores :</i></p>
			<?		 
			 $cantidad_indicadores=count($objetivos_wp[0]['objetivo'.$i]);	
			 ?>
			 <div id="contenedorIndicadores_<? echo ($i+1);?>">
			 <?			 
			 for($x=0;$x<$cantidad_indicadores;$x++){
				 if($x==0){
				 ?>
					<a id="btn_agregar_indicadores" name="<? echo ($i+1);?>" class="btn-btn-info btn_agregar_indicador" href="#">Agregar +</a>	
				 <?	 					 
				 }
				 //echo $objetivos_wp[0]['objetivo'.$i]['indicador'.$x];	
				 ?>
				  
			       <div class="added">                   
		    	      <textarea rows="6" type="text" name="indicadores_objetivo_<? echo ($i+1);?>[]" id=" indicador_<? echo ($i+1).'_'.($x+1); ?>"><? echo $objetivos_wp[0]['objetivo'.$i]['indicador'.$x]; ?></textarea><a href="#" class="eliminar6">&times;</a>
		      		</div>
	      		 
				 
				 <?					 				 
    		}
			?>			
			</div>
			
			<td  style="border:1px solid" >
          </tr>  
            <?
			
    	}		 	
	}else{
	
	?>  
     <tr id="contenedorObjetivos">  
		<td  style="border:1px solid" ><p><i>Objetivos :</i></p>
		  	<a id="agregarCampo5" class="btn-btn-info" href="#">Agregar +</a>
	      		<div id="contenedor5">
		       		<div class="added">
		          		<textarea rows="6" type="text" name="objetivos[]" id="objetivo_1" placeholder="Objetivos 1"></textarea><a href="#" class="eliminar5">&times;</a>
		      		</div>
	      		</div>
	  	</td>
		<td  style="border:1px solid" ><p><i>Indicadores :</i></p>
		  		<a id="btn_agregar_indicadores" name="1" class="btn-btn-info btn_agregar_indicador" href="#">Agregar +</a>
	      		 <div id="contenedorIndicadores_1">
			       <div class="added">
		    	      <textarea rows="6" type="text" name="indicadores_objetivo_1[]" id="indicador_1_1" placeholder="Indicadores 1"></textarea><a href="#" class="eliminar6">&times;</a>
		      		</div>
	      		 </div>
	 	 </td>         
	</tr>
	<? }?>  
		 	
</table>


<input type="submit" class="guardar" id="guardar" name="guardar" action="" value="Guardar">
</form>
<br /><br /><br /><br /><br /><br />
<a href="/soluciones-pedagogicas/registro-de-planificacion/">Volver Atras</a>
</br>
<a href="/soluciones-pedagogicas/">Volver Pagina Principal</a>

<?php get_sidebar();?>
<?php get_footer();?>