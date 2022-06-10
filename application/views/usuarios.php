<h1> Tabla de Datos </h1>
<form name="formulario" action="Listas.php" method="get">
dui<input type="text" name= "dui" id="dui" /><br>
Nombre <input type="text" name="nombre" id="nombre" /><br>
Contraseña<input type="password" name="contra" id="contra"/>
<button type="submit">Enviar</button> 
</form>
<?php 
foreach ($usuario as $datos => $nombre) {
     
    echo " $datos . $nombre <br>";
}
?>