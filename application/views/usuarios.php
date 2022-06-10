<h1> Tabla de Datos </h1>
<form action="" method="post">
dui<input type="text" id="nombre" /><br>
Nombre <input type="text" id="nombre" /><br>
Contraseña<input type="password" id="contra"/>
<button type="submit">Enviar</button> 
</form>
<?php 
foreach ($usuario as $datos => $nombre) {
     
    echo " $datos . $nombre <br>";
}
?>