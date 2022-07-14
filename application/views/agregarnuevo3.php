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
            padding: 10px;
            content: auto;
            background-color: lightblue;
            border-top: 3px dashed red;
            border-left: 3px dashed red;
            border-right: 3px dashed red;


        }

        .foot {
            padding: 10px;
            content: auto;
            background-color: lightblue;
            font-weight: 700px;
            font-family: sans-serif;
            border-bottom: 3px dashed red;
            border-left: 3px dashed red;
            border-right: 3px dashed red;

        }
    </style>
</head>
<header class="head">
    <h1 class="text">Formulario para Dui</h1>
</header>

<body>
    <div class="container-fluid">
        <h3 class="bg-info text-success">Tabla de Datos </h3>
    </div>

    <?= isset($sms) ? $sms : '' ?>
    <div class="container">
        <?= $tabla_datos; ?>
    </div>
    <div class="modal fade" id="example" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <form id="form_2" method="post" action="http://localhost/CodeIgniter/index.php/Listas/eliminar_by_ajax">
        <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="exampleModalLabel">Eliminar Dui </h4>
            </div>
            <div class="modal-body">
              <input type="hidden" name="dui" id="dui" class="form-control" id="recipient-name">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-danger" id="eliminar" name="eliminar">Eliminar</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h4>
                </div>
                <form id="form_3" method="POST" action="http://localhost/CodeIgniter/index.php/Listas/actualizar_by_ajax">
                <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="recipient-andui" name="andui">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nuevo dui</label>
                            <input type="text" class="form-control" id="recipient-dui" name="dui" minlength="10" maxlength="10"/>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nuevo nombre</label>
                            <input type="text" class="form-control" id="recipient-name" name="nombre" onkeypress="return !(event.charCode >= 48 && event.charCode <= 57)"/>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">Nueva edad</label>
                            <input type="text" class="form-control" id="recipient-age" name="edad" maxlength="2" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="submit" id="actualizar" class="btn btn-warning">Actualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    </form>




    <div class="container-fluid">
        <h3 class="text-danger"> Nuevo Usuario</h3>
    </div>
    <div class="container">
        <form id="form_1" method="POST" style="margin: 0px 1px 2px 3px;">
        <fieldset>
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
        </fieldset>
        </form>
    </div>

    <script>
        $('#example').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var recipient = button.data('dui')
            var modal = $(this)
            modal.find('.modal-title').text('Desea eliminar el Dui: ' + recipient)
            modal.find('.modal-body input').val(recipient)
        });
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var dui = button.data('dui')
            var nombre = button.data('nombre')
            var edad = button.data('edad')
            var modal = $(this)
            modal.find('.modal-title').text('Actualizar usuario ' + dui)
            modal.find('.modal-body #recipient-andui').val(dui)
            modal.find('.modal-body #recipient-dui').val(dui)
            modal.find('.modal-body #recipient-name').val(nombre)
            modal.find('.modal-body #recipient-age').val(edad)
        })

        $('#Guardar').click(function() {
            event.preventDefault();
            let _datos = $('#form_1');
            $.ajax({
                url: 'http://localhost/CodeIgniter/index.php/Listas/guardar_by_ajax3',
                data: _datos.serialize(),
                type: 'POST',
                success: function(guardar) {
                    let _respuesta = JSON.parse(guardar);
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

        $('#eliminar').click(function(){
            event.preventDefault();
            let _datos =$('#form_2');
            $.ajax({
                url: 'http://localhost/CodeIgniter/index.php/Listas/eliminar_by_ajax',
                data: _datos.serialize(),
                type: 'POST',
                success: function(eliminar){
                    let _respuestadel = JSON.parse(eliminar);
                    console.log(_respuestadel);
                    if(_respuestadel.respuestadel == true){
                        alert(_respuestadel.msj)
                        $('#tabla1').html(_respuestadel.tabla_datos)
                        $('#example').modal('hide')
                    }else{
                        console.error(_respuestadel.msj)
                    }
                }
            });
        });
        $('#actualizar').click(function(){
            event.preventDefault();
            let _datos = $('#form_3');
            $.ajax({
                url: 'http://localhost/CodeIgniter/index.php/Listas/actualizar_by_ajax',
                data: _datos.serialize(),
                type: 'POST',
                success: function(actualizar){
                    let _respuestaupd = JSON.parse(actualizar);
                    console.log(_respuestaupd);
                    if(_respuestaupd.respuesta_upd == true){
                        alert(_respuestaupd.msj)
                        $('#tabla1').html(_respuestaupd.tabla_datos)
                        $('#exampleModal').modal('hide')
                    }else{
                        console.error(_respuesta.msj)
                    }
                }
            });
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <footer class="foot">
        <h3> Creado por Mario Acevedo</h3>
    </footer>
</body>

</html>