<h1>Tabla de Datos </h1>
<form name="formulario" action="Listas.php" method="post" id="post">
    Dui: <input type="text" name="numeros" id="dui_1" value="" /><input type="submit" value="Buscar" /><br>
    </form>
    
        <table>
          <tr>
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
       
       
           