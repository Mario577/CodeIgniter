<?php 
 echo form_open('Listas/Guardar',array('method' => 'POST'));
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