<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0 , maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.4/jquery.validate.min.js"></script>

    <style>
        div.errores {
            width: 300px;
            margin: 0px;
            padding: 10px;
            border: 1px solid #3c6;
            display: none;
        }

        .head {
            height: 50px;
            background-color: lightblue;
            
        }

        .foot {
            height: 50px;
            background-color: lightblue;
            font-weight: 700px;
            font-family: sans-serif;
        }

    </style>
</head>
 <header class="head"> <h1 class="text">Formulario para Dui</h1> </header>

<body>
    <div class="container-fluid">
        <h3 class="bg-info text-success">Tabla de Datos </h3>
    </div>

    <?= isset($sms) ? $sms : '' ?>
    <div class="container">

    
        <?= $tabla_datos; ?>

    </div>
    <div class="container-fluid">
        <h3 class="text-danger"> Nuevo Usuario</h3>
    </div>
    <div class="container">
        <form id="form_1" method="POST" style="margin: 0px 1px 2px 3px;">
            <label> Dui:</label><br>
            <input class="form-control" type="text" name="dui" id="dui" placeholder="Dui:" minlength="10" maxlength="10" /><br>
            <div id="mensaje1" class="errores"> Debe contener 10 caracteres incluyendo :-</div>

            <label> Nombre:</label><br>
            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Nombre:" onkeypress="return !(event.charCode >= 48 && event.charCode <= 57)" /><br>
            <div id="mensaje2" class="errores"> Ingresa un Nombre</div>

            <label> Edad:</label><br>
            <input class="form-control" type="number" name="edad" id="edad" placeholder="Edad:" maxlength="2" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" /><br>
            <div id="mensaje3" class="errores"> Ingresa una Edad</div>
            <div id="mensaje4" class="errores"> Debe ser mayor de 18 años</div>
            <button type="submit" class="btn btn-success" name="Guardar" id="Guardar">Guardar</button>

        </form>
    </div>

    <script>
        $('#Guardar').click(function() {
            event.preventDefault();
            var _datos = $('#form_1');
            $.ajax({
                url: 'http://localhost/CodeIgniter/index.php/Listas/guardar_by_ajax3',
                data: _datos.serialize(),
                type: 'POST',
                success: function(reshhh) {
                    let _respuesta = JSON.parse(reshhh);
                    console.log(_respuesta);
                    if (_respuesta.respuesta == true) {
                        alert(_respuesta.msj)
                        $('#tabla1').html(_respuesta.tabla_datos);
                        
                    } else {
                        console.error(_respuesta.msj);
                    }
                }
            });
        });
        $('.btn-danger').click(function(){
            event.preventDefault();
            console.log(event.target.parentNode.parentNode.remove);
           /* var _delete = $('#eliminar');
            $.ajax({
              url: 'http://localhost/CodeIgniter/index.php/Listas/eliminar',
              data: _delete.serialize(),
              type: 'POST',
              success: function(del){
                let _remover = JSON.parse(del);
                 console.log(_remover);
                 if(_remover.respuesta == true){
                  alert(_remover.msj)
                 }else{
                  console.error(_remover.msj);
                 }
              }

            });
            */
        });
        $('.btn-warning').click(function(){
            event.preventDefault();
            console.log(event.target.parentNode.parentNode);
        });

    

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <footer class="foot"><p> Creado por Mario Acevedo</p></footer>
</body>

</html>