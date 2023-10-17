<?php require_once "models/CategoriasModelo.php"; ?>

<div class="modal fade" id="modalProducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="tituloProducto">Nuevo Producto</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <form id="formularioProducto">
     <div class="row">
      <div class="col-md-9">
       <label class="form-label" for="nombreProducto">Nombre Producto</label>
       <input type="text" name="nombreProducto" id="nombreProducto" required class="form-control">
      </div>
      <div class="col-md-3">
       <label class="form-label" for="precioProducto">Precio</label>
       <input type="number" name="precioProducto" id="precioProducto" required class="form-control">
      </div>
     </div>
     <div class="row mt-3">
      <div class="col-md-4">
       <label class="form-label" for="stockProducto">Stock</label>
       <input type="number" name="stockProducto" id="stockProducto" required class="form-control">
      </div>
      <div class="col-md-4">
       <label for="estadoProducto" class="form-label">Estado</label>
       <select name="estadoProducto" id="estadoProducto" required class="form-select">
        <option value="1">Disponible</option>
        <option value="0">Agotado</option>
       </select>
      </div>
      <div class="col-md-4">
       <label for="categoriaProducto" class="form-label">Categoría</label>
       <select name="categoriaProducto" id="categoriaProducto" required class="form-select">
        <option value="">Seleccione Categoria</option>
        <?php  
        $resultado = CategoriasModelo::ListarCategorias();

        while($fila = $resultado->fetch_assoc() ) {
            echo'<option value="'.$fila["idCategorias"].'">'.$fila["nombreCategoria"].'</option>';
        }

        ?>

       </select>
      </div>
     </div>
     <div class="row mt-3">
      <div class="col-12">
       <label for="imgProducto" class="form-label">Imagen</label>
       <input type="file" name="imgProducto" id="imgProducto" required class="form-control">
      </div>
     </div>
     <div class="row mt-3">
      <div class="col-md-12 d-grid">
       <button class="btn btn-primary" type="submit">Guardar Producto</button>
      </div>
     </div>
     <input type="hidden" name="tipoOperacion" value="insertarProducto" id="tipoOperacion">
     <input type="hidden" name="idProducto" value="0" id="idProducto">
     <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $_SESSION['idUsuario']; ?>">
    </form>
   </div>

  </div>
 </div>
</div>

<div class="modal fade" id="modalCategoria" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <h5 class="modal-title" id="tituloCategoria">Nuevo Categoría</h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
   </div>
   <div class="modal-body">
    <form id="formularioCategoria">
     <div class="row">
      <div class="col-md-12">
       <label class="form-label" for="nombreCategoria">Nombre Categoria</label>
       <input type="text" name="nombreCategoria" id="nombreCategoria" required class="form-control">
      </div>
     </div>
     <div class="row mt-3">
      <div class="col-md-12 d-grid">
       <button class="btn btn-primary" type="submit">Guarda Categoria</button>
      </div>
     </div>
     <input type="hidden" name="tipoOp" value="insertarCategoria" id="tipoOp">
     <input type="hidden" name="idCategoria" value="0" id="idCategoria">
     <input type="hidden" name="idUs" id="idUs" value="<?php echo $_SESSION['idUsuario']; ?>">
    </form>
   </div>

  </div>
 </div>
</div>