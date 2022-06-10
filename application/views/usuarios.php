<h1> Tabla de Datos </h1>
<form name="formulario" action="Listas.php" method="get">
Dui<input type="text" name= "dui" id="dui_1" /><br>
Nombre <input type="text" name="nombre" id="nombre_1" /><br>
Contraseña<input type="password" name="contra" id="contra_1"/>
<button type="submit">Enviar</button> 
</form>





<?php 
    

    
        foreach ($empleados as $row) {
     
            echo " $row->dui <br>";
            echo " $row->nombre <br>";
            echo " $row->edad <br>";
            
        }
