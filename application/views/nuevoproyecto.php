<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0 , maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
    <title>Vista</title>
</head>
<body>
<div class="page-header" >
  <h1 class="bg-success text-danger">Tabla Usuarios<small> V.0.2.1</small></h1>
</div>
<div class="container">
<?= $tabla_datos ?>
</div>
<div class="container">
    <form >
<div class="form-group has-success">
  <label class="control-label"  for="inputSuccess1">Ingresa tu Informacion</label>
  <input type="text" class="form-control" id="inputSuccess1"  aria-describedby="helpBlock2">
  <span id="helpBlock2" class="help-block">Debe contener 9 caracteres numericos</span>
</div>
<div class="form-group has-success">
  <label class="control-label" for="inputSuccess1"></label>
  <input type="text" class="form-control" id="inputSuccess1">
  <span id="helpBlock2" class="help-block">Debe contener Nombre y Apellidos</span>
</div>
<div class="form-group has-success">
  <label class="control-label" for="inputSuccess"></label>
  <input type="number" class="form-control" id="inputSuccess">
  <span id="helpBlock2" class="help-block">Ingresa tu Edad</span>
</div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>