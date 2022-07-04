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
<?= $tabla_datos; ?>
    <h3 class="title">Actualizar usuario</h3>
    <div class="container">
    <form method="POST" action="http://localhost/CodeIgniter/index.php/Listas/update_css"><br>
            <label> Cambiar Dui</label><br>
            <input type="text" class="form-control" id="cd" name="cd" placeholder="Ingresa tu Dui:" data="$fila->dui" /><br>
            <label> Cambiar Nombre</label><br>
            <input type="text" class="form-control" id="cn" name="cn" placeholder="Ingresa tu Nombre:" data="$fila->nombre"><br>
            <label> Cambiar Edad</label><br>
            <input type="number" class="form-control" id="ce" name="ce" placeholder="Ingresa tu Edad" data="$fila->edad"><br>
            <input type="submit" class="btn btn-success" value="Actualizar"/>
        </div>    
    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>

</html>