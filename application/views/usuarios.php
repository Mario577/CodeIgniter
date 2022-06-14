<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0 , maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
  <div class="container-fluid">
<h1 class="bg-info text-success">Tabla de Datos </h1>
</div>

<?= isset($sms) ? $sms : ''?>
    <div class="container">
        <table class="table table-bordered">
          
          <tr class="info">
            <th>Dui</th>
            <th>Nombre</th>
            <th>Edad</th>
          </tr>
      </div>
      
      <a href="http://localhost/CodeIgniter/index.php/Listas/agregar"><input type="button" class="btn btn-success" value="Agregar"></a>

       
        <?php foreach ($empleados as $row){ 
                echo "<tr>";
                echo "<td> $row->dui </td>";
                echo "<td>$row->nombre</td>";
                echo "<td>$row->edad </td>";
                echo "</tr>";
            
        }
        ?>
        </table>
         <br>
          <br>
          <select class="form-control" name="datos_numeros">
            <?php
              foreach ($empleados as $dui){

                echo "<option> $dui->dui </option>";

              }       
            ?>
          </select> 
          <br>
          <select class="form-control"name="datos_clientes">
          
            <?php
              foreach ($infoclientes as $name){

                echo "<option> $name->nombre </option>";
                
              }       
            ?>
            
            
          </select> 
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>