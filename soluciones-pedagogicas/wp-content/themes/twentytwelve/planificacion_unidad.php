<?php

/*

Template Name: Planificacion Unidad

*/
session_start();
?>



<?php get_header(); ?>
<?php echo $_POST['curso_2'];?>

<table>
   <tr>
      <td colspan="6" style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
         <strong>Planificacion de Unidad</strong>
      </td>
   </tr>
   <tr>
      <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; vertical-align:middle;"><label>Docente :</label></td>
      <td colspan="5"  style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px;">
         <? echo $_SESSION['nombre_d']; ?>
      </td>
   </tr>
   
     
<form id="form_3" name="form" action="" method="post">
   <tr>
 <td  style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px;">   
<label>Curso :</label>
</td>
<td cellpadding="10" style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px;">   
<SELECT id="curso_2" NAME="curso_2" size="1">
   <OPTION VALUE="8">8º Basico</OPTION>
   <OPTION VALUE="7">7º Basico</OPTION>
   <OPTION VALUE="6">6º Basico</OPTION>
   <OPTION VALUE="5">5º Basico</OPTION>
   <OPTION VALUE="4">4º Basico</OPTION>
   <OPTION VALUE="3">3º Basico</OPTION>
   <OPTION VALUE="2">2º Basico</OPTION>
   <OPTION VALUE="1">1º Basico</OPTION> 
</SELECT>
</td>
&nbsp;&nbsp;&nbsp;&nbsp;
<td  style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px;">
<label>Asignatura :</label>
</td>
<td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px;">
<SELECT id="asignatura_2" NAME="asignatura_2" size="1">
   <OPTION VALUE="matematicas">Matematicas</OPTION>
   <OPTION VALUE="lenguaje">Lenguaje y comunicación</OPTION>
   <OPTION VALUE="cienciasn">Ciencias Naturales</OPTION>
   <OPTION VALUE="historia">Historia</OPTION>
   <OPTION VALUE="gcienciass">Geografia y Ciencias sociales</OPTION>
   <OPTION VALUE="artes">Artes visuales</OPTION>  
</SELECT> 
</td>
&nbsp;&nbsp;&nbsp;&nbsp;
<td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px;">
<label>Año :</label> 
</td>
<td  style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px;">  
<SELECT NAME="ano_2" size="1">
   <OPTION VALUE="14">2014</OPTION>
   <OPTION VALUE="13">2013</OPTION>
   <OPTION VALUE="12">2012</OPTION>
   <OPTION VALUE="11">2011</OPTION>
   <OPTION VALUE="10">2010</OPTION>
   <OPTION VALUE="09">2009</OPTION>
   <OPTION VALUE="08">2008</OPTION>
   <OPTION VALUE="07">2007</OPTION> 
</SELECT>
</td>
&nbsp;&nbsp;&nbsp;&nbsp;
</tr>
</table>
<input type="submit" id="guardar_3" name="guardar_3" value="Guardar">
</form>
<br><br>

<a href="/soluciones-pedagogicas/?page_id=127">Volver al menu</a>&nbsp;&nbsp;&nbsp;&nbsp;

<a href="wp-content/themes/child_twentyfourteen/mensaje3.php">Guardar</a>&nbsp;&nbsp;&nbsp;&nbsp;

<a href="/soluciones-pedagogicas/?page_id=199">Siguiente</a>&nbsp;&nbsp;&nbsp;&nbsp;

<?php get_sidebar(); ?>

<?php get_footer(); ?>