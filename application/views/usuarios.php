<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0 , maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    .form-control{
      width: 150%;
      margin-right: 500px;
    }
    .input-group-addon{
      width: 100%;
    }
    body{
      background-color: whitesmoke;
    }
    .text-info{
      text-align: left;
      margin-left: 10px;
    }
    .bg-danger{
      width:100%;
    }

  </style>
</head>
<body>
  <h1>Tabla de Usuarios</h1>
<?= isset($sms) ? $sms : ''?>
    <div class="container">
        <table class="table table-bordered">
          
          <tr class="info">
            <th>Dui</th>
            <th>Nombre</th>
            <th>Edad</th>
          </tr>
      </div>
       
        <?php foreach ($empleados as $row){ 
                echo "<tr>";
                echo "<td> $row->dui </td>";
                echo "<td>$row->nombre</td>";
                echo "<td>$row->edad </td>";
                echo "</tr>";
            
        }
        ?>
        </table>


    <h1 class="text-info">Agregar nuevo usuario</h1>
        <form id="form_1" method="POST" action="http://localhost/CodeIgniter/index.php/Listas/Guardar">
            <br>
            <div class="col-md-3">
              <br>
            <span class="input-group-addon"><span class= "glyphicon glyphicon-credit-card"></span></span>
            <input class="form-control" type="text" name="dui" id="dui" placeholder="Dui:" minlength="10" maxlength="10" /><br>
            <br>
            <span class="input-group-addon"><span class= "glyphicon glyphicon-user"></span></span>
            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre:" onkeypress="return !(event.charCode >= 48 && event.charCode <= 57)" /><br>
            <br>
            <span class="input-group-addon"><span class= "glyphicon glyphicon-plus-sign"></span></span>
            <input class="form-control" type="number" name="edad" id="edad" placeholder="Edad:" maxlength="2" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" />
            <br>
            <button type="submit" class="btn btn-success" name="Guardar" id="Guardar">Guardar</button>  
            </div>
          </form>   



  <footer class="foot_1">
  </footer>      
            
  
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>