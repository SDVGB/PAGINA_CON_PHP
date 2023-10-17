<?php require_once "controllers/seguridadControlador.php"; ?>

<!doctype html>
<html lang="es">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link href="views/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="views/dist/css/estilos.css">

    <title>Categorias</title>

  </head>
  <body>

     <?php 
     require_once "views/dist/nav.php";
    ?>

    <div class="container-xl">
      <div class="row mt-4">
        <div class="col-md-10">
          <h1>Gestionar Categorias</h1>
        </div>
        <div class="col-md-2">
          <div class="d-grid">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCategoria">Agregar Categoria</button>
          </div>
        </div>
        <hr>
      </div>
       <div class="row mt-4">
      <div class="col-md-12">
        <table class="table table-bordered bg-dark text-white">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Acciones</th>
            </tr>
          </thead>
          <tbody id="tbodyCategorias">
            
          </tbody>
        </table>
      </div>
    </div>
 </div>

    <?php 
    require_once "views/dist/modales.php";
    ?>

    <script src="views/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="views/dist/js/gestionarCategorias.js"></script>
    
  </body>
</html>