
<h1>Tabla de Datos </h1>
<?php 
 echo form_open('Listas/Guardar', array('method' => 'POST'));
 echo form_label('Dui:');
 echo form_input('dui');
 echo "<br>";
 echo form_label('Nombre:');
 echo form_input('nombre');
 echo "<br>";
 echo form_label('Edad:');
 echo form_input('edad');
 echo "<br>";
 echo form_submit('submit', 'agregar');
 echo form_close();
?>
<?= isset($sms) ? $sms : ''?>
    
        <table>
          <tr>
            <th>Dui</th>
            <th>Nombre</th>
            <th>Edad</th>
          </tr>
       

       
        <?php foreach ($empleados as $row){ 
                echo "<tr>";
                echo "<td> $row->dui </td><br>";
                echo "<td>$row->nombre</td><br>";
                echo "<td>$row->edad </td><br>";
                echo "</tr>";
            
        }
        ?>
        </table>
       
           