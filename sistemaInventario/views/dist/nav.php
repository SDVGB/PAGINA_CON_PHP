   <ul class="nav bg-dark p-2">
      <li class="nav-item">
        <a class="nav-link" href="index.php"> 
          <?php echo $_SESSION['nombreCompleto']; ?> </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="productos.php">Productos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Categorias.php">Categorías</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="#">Usuarios</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="controllers/LogoutControlador.php">Logout</a>
      </li>
    </ul>