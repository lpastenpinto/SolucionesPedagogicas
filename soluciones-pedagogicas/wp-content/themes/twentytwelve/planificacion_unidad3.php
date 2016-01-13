<?php

/*

Template Name: Planificacion unidad 3

*/

?>

<?php get_header(); ?>

<!-- <script>        
    function mostrar(){                     
            $.ajax({   
                type: 'POST',
                url:'/soluciones-pedagogicas/wp-admin/admin-ajax.php',
                data: { 
                action:'ver'
                 },
                success: function(datos){       
                    $('#concepto').html(datos);
                }
            });
        }                  
     </script>--> 
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script> 
     <script>   
     $(document).ready(function(){
 
$("#concepto_1").change(function(){
 
//alert ("change event occured with value: " + document.getElementById("concepto_1").value);
   
    var url ="/wp-admin/admin-ajax.php";              
    $.ajax({
    type: "GET",
    url:url , 
     data: {
      action:'wp_ver','c': concepto_1 },
      success: function(datos){        
         $("#concepto").html(datos);
        }
      });
});
 
});
 
</script>

      <!-- /*$("#concepto_").change(function(codigo){           
    var cod = codigo.value; 
    var url ="/wp-admin/admin-ajax.php";              
    $.ajax({
    type: "GET",
    url:url , 
     data: {
      action:'wp_ver','c': cod },
      success: function(datos){        
         $("#concepto").html(datos);
        }
      });
    });*/-->


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
    
    <select name="concepto_1" id="concepto_1" >
        <option VALUE="0"></option>
        <option VALUE="1">1</option>
        <option VALUE="2">2</option>
        <option VALUE="3">3</option>
    </select>

    <br><br>  
    <div id="concepto">esto es una prueba para demostrar que el cntenido no se sale de este div y asi poder seguir escribiendo el contenido y tambien se pueda enviar a otros lugaress</div>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
    <td style="border:1px solid #CCCCCC; padding:5px 5px 5px 5px; text-align:center;"><INPUT TYPE="text" size="1"></td>
</tr>          
</table>
<br><br>
<input type="submit" id="guardar_planificacion_unidad" name="guardar_planificacion_unidad" value="Guardar Datos">
<br><br><br><br><br><br><br><br>
</form>

<a href="/soluciones-pedagogicas/?page_id=199">Volver atras</a>&nbsp;&nbsp;&nbsp;&nbsp;

<a href="/soluciones-pedagogicas/?page_id=127">Volver al menu</a>&nbsp;&nbsp;&nbsp;&nbsp;

<a href="wp-content/themes/child_twentyfourteen/mensaje7.php">Guardar</a>&nbsp;&nbsp;&nbsp;&nbsp;

<?php get_sidebar(); ?>

<?php get_footer(); ?>