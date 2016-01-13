<?php
/*
Template Name: Planificacion_Diaria
*/
?>
<?php get_header(); ?>
<h2>
Planificacion Clase a Clase<br>Curso: <? echo $curso; ?><br>Asignatura: <? echo $asignatura; ?><br><br>
</h2>
<form id="plan_diario_1" name="plan_diario_1" action="" method="post">
<table>
<tr>   
    <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">Fecha</td> 	
    <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">Obj. de  Aprendizaje</td>
    <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">Indicadores de evaluacion</td>
    <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">Actividades</td>
    <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">>Recursos</td>
    <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">Tipos de evaluacion</td>
</tr>  
<tr>
    <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
    <input  type="date" name="fecha_clase" size="10" class="Fecha" value="" />
    </td>
    <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
    	<SELECT id="objetivos" NAME="objetivos" size="1">
           <OPTION VALUE="8">8</OPTION>
	   <OPTION VALUE="7">7</OPTION>
	   <OPTION VALUE="6">6</OPTION>
	   <OPTION VALUE="5">5</OPTION>
	   <OPTION VALUE="4">4</OPTION>
	   <OPTION VALUE="3">3</OPTION>
	   <OPTION VALUE="2">2</OPTION>
	   <OPTION VALUE="1">1</OPTION> 
    	</SELECT>
    </td>
    <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
    	<SELECT id="indicadores" NAME="indicadores" size="1">
           <OPTION VALUE="8">8</OPTION>
	   <OPTION VALUE="7">7</OPTION>
	   <OPTION VALUE="6">6</OPTION>
	   <OPTION VALUE="5">5</OPTION>
	   <OPTION VALUE="4">4</OPTION>
	   <OPTION VALUE="3">3</OPTION>
	   <OPTION VALUE="2">2</OPTION>
	   <OPTION VALUE="1">1</OPTION>  
    	</SELECT>
    </td>    
    
    <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
      <INPUT TYPE="text" NAME="semanas" size="2" value=<? echo $semanas; ?>
      </td>   
    <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
    	<SELECT id="actitudes" NAME="actitudes" size="1">
           <OPTION VALUE="8">8</OPTION>
	   <OPTION VALUE="7">7</OPTION>
	   <OPTION VALUE="6">6</OPTION>
	   <OPTION VALUE="5">5</OPTION>
	   <OPTION VALUE="4">4</OPTION>
	   <OPTION VALUE="3">3</OPTION>
	   <OPTION VALUE="2">2</OPTION>
	   <OPTION VALUE="1">1</OPTION>  
    	</SELECT>
    </td>
    <td style="border:1px solid #CCCCCC; padding:15px 15px 15px 15px; text-align:center;">
        <SELECT id="estrategia" NAME="estrategia" size="1">
           <OPTION VALUE="8">8</OPTION>
	   <OPTION VALUE="7">7</OPTION>
	   <OPTION VALUE="6">6</OPTION>
	   <OPTION VALUE="5">5</OPTION>
	   <OPTION VALUE="4">4</OPTION>
	   <OPTION VALUE="3">3</OPTION>
	   <OPTION VALUE="2">2</OPTION>
	   <OPTION VALUE="1">1</OPTION>  
    	</SELECT>    
    </td>    
</tr>  
</table>

<INPUT type="button" value="Agregar Otra Clase" onclick="AgregarClase('planificacion');" />
<br/><br/>
<input type="submit" id="guardar" name="guardar" value="Guardar">
<br><br><br><br><br><br><br><br>

</form>
<a href="/soluciones-pedagogicas/?page_id=193">Volver atras</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="/soluciones-pedagogicas/?page_id=127">Volver al menu</a>&nbsp;&nbsp;&nbsp;&nbsp;
<a href="wp-content/themes/child_twentyfourteen/mensaje7.php">Guardar</a>&nbsp;&nbsp;&nbsp;&nbsp;
<?php get_sidebar(); ?>
<?php get_footer(); ?>

<script type="text/javascript">

jQuery(document).ready(function() {
    jQuery('.Fecha').datepicker({
        
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
 currentText: 'Hoy'
    });
});

</script>
<SCRIPT language="javascript">

          function AgregarClase(tableID) {

               var table = document.getElementById(tableID);
 
               var rowCount = table.rows.length;

               var row = table.insertRow(rowCount);
 
               var cell1 = row.insertCell(0);

               var element1 = document.createElement("input");

               element1.class = "Fecha";
			         element1.setAttribute("onclick", "vaciar_campo(this);");

               cell1.appendChild(element1); 

               var cell2 = row.insertCell(1);

               var element2 = document.createElement("input");			   

               element2.type = "text";
			         element2.setAttribute("onclick", "vaciar_campo(this);");
               cell2.appendChild(element2);
			   
			      var campo4 = document.createElement("input");
            campo4.type = "button";
            campo4.value = "eliminar";
            campo4.onclick = function ()
 
            {
 
                var fila = this.parentNode.parentNode;
                var tbody = table.getElementsByTagName("tbody")[0];
 
                tbody.removeChild(fila);
 
            }
			   
			   cell2.appendChild(campo4);		

          }

 
          function EliminarClase(tableID) {

               try {

               		 var table = document.getElementById(tableID);

              		 var rowCount = table.rows.length;

 

               		for(var i=0; i<rowCount; i++) {

                   		 var row = table.rows[i];
	
                    	 var chkbox = row.cells[0].childNodes[0];

                    	if(null != chkbox && true == chkbox.checked) {

                         		table.deleteRow(i);

                         		rowCount--;

                         		i--;

                    	}

               		}

               }catch(e) {

                    alert(e);

               }
          } 
		  
		  
function myCreateFunction() {
 
            var table = document.getElementById("planificacion");
            var row = table.insertRow(0);
            var fila = table.insertRow();
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            // CREO UN ELEMENTO DEL TIPO INPUT CON document.createElement("NOMBRE TAG HTML QUE QUIERO CREAR");
 
 
 
            var input = document.createElement("input");            
            input.className = "Fecha";            
            input.setAttribute("onclick", "vaciar_campo(this);");
           
 
            // Creo un segundo elemento Input
 
 
            var input2 = document.createElement("input");
            input2.type = "text";
            input2.className = "ptss";
            input2.value = "0";
            input2.setAttribute("onclick", "vaciar_campo(this);");
 
 
            var campo4 = document.createElement("input");
            campo4.type = "button";
            campo4.value = "-";
            campo4.onclick = function ()
 
            {
 
                var fila = this.parentNode.parentNode;
                var tbody = table.getElementsByTagName("tbody")[0];
 
                tbody.removeChild(fila);
 
            }
 
 
            // CON EL METODO appendChild(); LOS AGREGO A LA CELDA QUE QUIERO
            cell1.appendChild(input);
            cell2.appendChild(input2);
            cell2.appendChild(campo4);
        }
 
 
 
        function vaciar_campo(input) {
 
            input.value = "";
 
        }		  
</SCRIPT>
                                                        
                            