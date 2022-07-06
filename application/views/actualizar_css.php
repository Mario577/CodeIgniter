<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0 , maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title>Actualizar</title>
    <style>
        h2 {
            background-color: slategrey;
            color: white;
            text-align: center;
        }

        .title {
            background-color: slategrey;
            color: white;
            text-align: center;

        }

        body {
            background-color: whitesmoke;
        }

        label {
            margin-top: 5px;
            margin-bottom: 3px;
            color: blueviolet;
        }
    </style>
</head>

<body>


    <h2>Tabla de Usuarios</h2>
    <br>
    <div class="container">
    <?= $tabla_datos; ?>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Actualizar Usuario</h4>
                </div>
                <form method="POST" action="http://localhost/CodeIgniter/index.php/Listas/update_css">
                <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">dui</label>
                            <input type="text" class="form-control" id="recipient-dui" name="dui">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">nombre</label>
                            <input type="text" class="form-control" id="recipient-name" name="nombre">
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="control-label">edad</label>
                            <input type="text" class="form-control" id="recipient-age" name="edad">
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
    <script>
       
        $('#exampleModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var dui = button.data('dui')
            var nombre = button.data('nombre')
            var edad = button.data('edad')
            var modal = $(this)
            modal.find('.modal-title').text('Actualizar usuario ' + dui)
            modal.find('.modal-body #recipient-dui').val(dui)
            modal.find('.modal-body #recipient-name').val(nombre)
            modal.find('.modal-body #recipient-age').val(edad)

        })
    </script>
</body>

</html>