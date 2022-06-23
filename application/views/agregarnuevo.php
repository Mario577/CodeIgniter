<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0 , maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
<h1 class="bg-info text-success">Tabla de Datos </h1>
</div>

<?= isset($sms) ? $sms : ''?>
    <div class="container">
        <table id= "tabla1" class="table table-bordered">
          
          <tr class="info">
            <th>Dui</th>
            <th>Nombre</th>
            <th>Edad</th>
          </tr>
      </div>
 
        <?php foreach ($empleados as $row){ 
                echo "<tr>";
                echo "<td>$row->dui </td>";
                echo "<td>$row->nombre</td>";
                echo "<td>$row->edad </td>";
                echo "</tr>";
            
        }
        ?>    
        </table>    
        <div class="container-fluid">
            <h3 class="text-danger"> Nuevo Usuario</h3>
        </div>
        <div class="container">
            <form id="form_1" method="POST">
                <label for="Dui"> Dui:</label>  
                <input class="form-control"type="text" name="dui" id="dui" placeholder="Dui:" /><br>
                <label for="Nombre"> Nombre:</label>  
                <input class="form-control"type="text" name="nombre" id="nombre" placeholder="Nombre:"/><br>
                <label for="Dui"> Edad:</label>  
                <input class="form-control"type="text" name="edad" id="edad" placeholder="Edad:"/><br>
                <button type="submit" class="btn btn-success" name= "Guardar" id="Guardar">Guardar</button>
                
            </form>
        </div> 
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#Guardar').click(function() {  
        $("#tabla1>tbody").append("<tr><td>"+ $('#dui').val() + "</td><td>"+ $('#nombre').val() + "</td><td>"+ $('#edad').val() + "</td></tr>");              
        event.preventDefault();
    var _datos = $('#form_1');  
    $.ajax({  
        url: 'http://localhost/CodeIgniter/index.php/Listas/guardar_by_ajax',  
        type: 'POST',  
        data: _datos.serialize(),  
        success: function(reshhh) {  
            let _respuesta = JSON.parse(reshhh);
            console.log(_respuesta);
            if (_respuesta.respuesta==true) {
                alert(_respuesta.msj)
            } else {
                console.error(_respuesta.msj);
            }
        }
    });      
    });   
    </script>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>