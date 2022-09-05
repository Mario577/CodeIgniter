<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0 , maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <title>Vista</title>
  <style>
  </style>
</head>

<body>
  <div class="page-header">
    <h1 class="bg-success text-danger">Tabla Usuarios<small> V.0.2.1</small></h1>
  </div>
  <?= isset($msj) ? $msj : '' ?>
  </div>

  <div class="container">
    <?= $tabla_datos; ?>

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
      <div class="modal-dialog modal-sm" role="document">
        <form method="post" action="http://localhost/CodeIgniter/index.php/Listas/eliminar_css">
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


    <form id="form_1" method="post" action="http://localhost/CodeIgniter/index.php/Listas/Guardar_css">
      <div class="form-group has-success">
        <label class="control-label">Ingresa tu Informacion</label>
        <input type="text" class="form-control" name="dui" id="dui" placeholder="Dui:" aria-describedby="helpBlock2" minlength="10" maxlength="10">
        <span class="help-block">Debe contener 10 caracteres numericos</span>
      </div>
      <div class="form-group has-success">
        <label class="control-label"></label>
        <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Nombre:" onkeypress="return !(event.charCode >= 48 && event.charCode <= 57)"/>
        <span class="help-block">Debe contener un Nombre</span>
      </div>
      <div class="form-group has-success">
        <label class="control-label"></label>
        <input type="number" name="edad" class="form-control" placeholder="Edad:" id="edad" maxlength="2" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"/>
        <span class="help-block">Ingresa tu Edad</span>
        <input type="submit" class="btn btn-success" value="Guardar" id="Guardar" />
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <script>
    $('#exampleModal').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget) // Button that triggered the modal
      var recipient = button.data('dui') // Extract info from data-* attributes
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this)
      modal.find('.modal-title').text('Dui a eliminar: ' + recipient)
      modal.find('.modal-body input').val(recipient)
    })
  </script>
  
</body>

</html>