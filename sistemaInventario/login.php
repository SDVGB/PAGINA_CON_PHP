<!doctype html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="views/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Inicio Sesión</title>
  </head>
  <body class="bg-dark">

    <div class="container-fluid">

   <div class="row mt-5">
     
    <div class="col-md-4 offset-md-4 bg-light p-5">
     <h1 id="tituloLogin">Sistema Inventario</h1>
     <form id="formuLogin">
      <div class="mb-3">
       <label for="correo">Email:</label>
       <input type="email" name="correo" class="form-control" required id="correo">
      </div>
      <div class="mb-3">
       <label for="password">Password:</label>
       <input type="password" name="password" class="form-control" required id="password">
      </div>
      <div class="mb-3 d-grid">
       <button type="submit" class="btn btn-primary">Iniciar</button>
      </div>
     </form>
    </div>

   </div>

  </div>

    <script src="views/dist/js/bootstrap.bundle.min.js"></script>
    <script src="views/dist/js/gestionarLogin.js"></script>

  </body>
</html>