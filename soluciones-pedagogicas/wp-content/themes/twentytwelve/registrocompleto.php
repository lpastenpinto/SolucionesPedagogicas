<?php
/*
Template Name: registro completo 1
*/
?>

<?php $id = $_POST['curso_f'];
$di=""; 
    switch($id){

    case 1:
        $di = "1º basico";
        break;
    case 2:
        $di = "2º basico";
        break;
    case 3:
        $di = "3º basico";
        break;
    case 4:
        $di = "4º basico";
        break;
    case 5:
        $di = "5º basico";
        break;       
    case 6:
        $di = "6º basico";
        break;       
    case 7:
        $di = "7º basico";
        break;      
    case 8:
        $di = "8º basico";
        break;       
    case 9:
        $di = "1º medio";
        break;       
    case 10:
        $di = "2º medio";
        break;       
    case 11:
        $di = "3º medio";
        break;       
    case 12:
        $di = "4º medio";
        break;       
      
        }       

?>
<?php get_header(); ?>
<form name="form_2" action="" method="post">
<label>Elige el curso :</label>
<SELECT NAME="curso_f" id="curso_f" size="1" onchange="form_2.submit()">
 <OPTION VALUE="0"></OPTION>
<?php
   global $wpdb;
   $result=$wpdb->get_results('select * from curso order by id_curso');
   
   foreach ($result as $resultado)
    {
 
     echo "<OPTION VALUE=".$resultado->id_curso.">".$resultado->nombre_curso."</OPTION>";                   
   
      }
?>
</SELECT>

</form><br><br><br><br>

<form name="form_1" action="" method="post">
<label>Elige Docente :</label>
<SELECT NAME="asignatura_f" id="asignatura_f" size="1">
<?php
   $usuarios = get_users('orderby=nicename&role=contributor');
  foreach ($usuarios as $usuario) { 
     echo "<OPTION VALUE=". $usuario->display_name .">". $usuario->display_name ."</OPTION>";                    
      }
?>
</SELECT><br><br> 
<label> Curso : </label>
<input type="text" name="n_curso" id="n_curso" size="10" value="<?php echo $di;?>"><br><br>    
<?php 
     global $wpdb;
      $id = $_POST['curso_f'];    
     $consulta = "SELECT * FROM asignatura WHERE id_curso_asignatura = '".$_POST['curso_f']."'";
     $resultado = $wpdb->get_results( $consulta );
      foreach ( $resultado as $fila ){
      echo "<input type='checkbox' value=".$fila->id_curso_asignatura.">".$fila->nombre_asignatura."<br>";
     }        
?>
<input name="enviar_" type="submit" id="enviar_"  value="Registrar datos">
</form><br><br><br><br>


<?php get_sidebar(); ?>
<?php get_footer(); ?>                                
                            
                            
                            
                            
                            
                            