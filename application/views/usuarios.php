<h1>Tabla de Datos </h1>
<form name="formulario" action="Listas.php" method="get">
    Dui<input type="text" name="dui" id="dui_1" /><br>
    <button type="submit">Enviar</button></form>
    
    <?php foreach ($empleados as $row){ 
        echo " $row->dui <br>";
        echo " $row->nombre <br>";
        echo " $row->edad <br>";
        }
