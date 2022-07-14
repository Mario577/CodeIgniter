<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0 , maximum-scale=1.0, minimum-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <title>Iniciar Sesion</title>
  <style>
  </style>
</head>

<body>
  <div class="page-header">
    <h1 class="bg-info text-primary">Iniciar Sesion<small> V.0.2.1</small></h1>
  </div>
    <div class="container">
    <form id="form_10" method="post" action="http://localhost/CodeIgniter/index.php/Listas/comprobar_css">
      <div class="form-group has-primary">
        <label class="control-label">Ingresa tu Informacion</label>
        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuario:" />
        <span class="help-block">Usuario</span>
      </div>
      <div class="form-group has-primary">
        <label class="control-label"></label>
        <input type="password" class="form-control" name="contraseña" id="contraseña" placeholder="Contraseña:"/>
        <span class="help-block">Contraseña</span>
      </div>
      <input type="submit" value="Ingresar" class="btn btn-success"/>
    </form>
  </div>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>

</html>