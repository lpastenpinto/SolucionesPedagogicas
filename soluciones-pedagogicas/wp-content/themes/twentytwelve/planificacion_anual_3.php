<?php
/*
Template Name: Planificacion anual 3-2
*/
?>
<?php get_header(); ?>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript">
$("#cambios").change(function () {
    if ($(this).val() == "1") {
        $("#concepto").text("Este es Goku:");
    } else if ($(this).val() == "2") {
        $("#concepto").text("¡Bien! Seleccionaste a Vegeta");       
    } else if ($(this).val() == "3") {
        $("#concepto").text("Una imagen épica de Trunks");        
    } else {
        $("#concepto").text("LOL");       
    }
});
</script> 
<h2>Planificacion Anual<br>
Curso: <? echo $curso; ?><br>
Asignatura: <? echo $asignatura; ?><br>
Unidad: <? echo $unidad; ?><br>
</h2>
<br><br>
<form id="planificacion_anual_3" name="planificacion_anual_3" action="" method="post">
<table>
    <tr>
    <td colspan="2" style="border:1px solid #CCCCCC; padding:10px 10px 10px 10px; text-align:center;">Trayecto</td>
    <td rowspan="2" style="border:1px solid #CCCCCC; padding:10px 10px 10px 10px; text-align:center;">Conceptos a aprender</td>
    <td style="border:1px solid #CCCCCC; padding:10px 10px 10px 10px; text-align:center;">Obj. de  Aprendizaje</td>
    <td rowspan="2" style="border:1px solid #CCCCCC; padding:10px 10px 10px 10px; text-align:center;">Indicadores de evaluación</td>
    <td rowspan="2" style="border:1px solid #CCCCCC; padding:10px 10px 10px 10px; text-align:center;">Habilidades</td>
    <td rowspan="2" style="border:1px solid #CCCCCC; padding:10px 10px 10px 10px; text-align:center;">Actitudes</td>
    <td rowspan="2" style="border:1px solid #CCCCCC; padding:10px 10px 10px 10px; text-align:center;">Estrategia de Aprendizaje</td>
    <td rowspan="2" style="border:1px solid #CCCCCC; padding:10px 10px 10px 10px; text-align:center;">Formas de evaluación</td>
    <td rowspan="2" style="border:1px solid #CCCCCC; padding:10px 10px 10px 10px; text-align:center;">Tipos de evaluación</td>
    </tr>
<tr>   
    <td style="border:1px solid #CCCCCC; padding:10px 10px 10px 10px; text-align:center;">Semanas</td> 	
    <td  style="border:1px solid #CCCCCC; padding:10px 10px 10px 10px; text-align:center;">Clases</td>    
    <td style="border:1px solid #CCCCCC; padding:5px 10px 5px 10px; text-align:center;">A. Esp.</td>
    
</tr>  
<tr>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;">
    
    <SELECT id="concepto_">
        <OPTION VALUE="0"></OPTION>
        <OPTION VALUE="1">concepto_1</OPTION>
        <OPTION VALUE="2">concepto_2</OPTION>
        <OPTION VALUE="3">concepto_3</OPTION>
    </SELECT> 
    <br><br>  
    <div id="concepto" >esto es una prueba para demostrar que el cntenido no se sale de este div y asi poder seguir escribiendo el contenido y tambien se pueda enviar a otros lugaress</div>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
</tr>    	   
</table>
<br><br>
<input type="submit" id="guardar_planificacion_anual" name="guardar_planificacion_anual" value="Guardar">
<br><br><br><br><br><br><br><br>
</form>
<a href="/soluciones-pedagogicas/?page_id=193">Volver atras</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="/soluciones-pedagogicas/?page_id=127">Volver al menu</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="wp-content/themes/child_twentyfourteen/mensaje7.php">Guardar</a>&nbsp;&nbsp;&nbsp;&nbsp;
<?php get_sidebar(); ?>
<?php get_footer(); ?>
                            
                            
                            