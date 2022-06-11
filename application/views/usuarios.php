<h1>Tabla de Datos </h1>
<form name="formulario" action="Listas.php" method="post">
    Dui: <input type="text" name="numeros" id="dui_1" /><button type="submit">Buscar</button><br>
    </form>
    
<table>
    <tr><tr>
        <td><a href=""></td>
        <td><a href=""></td>
        <td><a href=""></td>
        </tr>
          </table>

        <?php
        foreach ($empleados as $row){ 
                echo "$row->dui<br>";
                echo "$row->nombre<br>";
                echo "$row->edad <br>";
            
        }
       
       
           