<h1> Tabla de Datos </h1>
<form name="formulario" action="Listas.php" method="get">
dui<input type="text" name= "dui" id="dui_1" /><br>
Nombre <input type="text" name="nombre" id="nombre_1" /><br>
Contraseña<input type="password" name="contra" id="contra_1"/>
<button type="submit">Enviar</button> 
</form>
<?php 
foreach ($usuario as $datos => $nombre) {
     
    echo " $datos . $nombre <br>";
}
?>