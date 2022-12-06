<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda virtual con Framework CSS</title>
    <link rel="stylesheet" href="<?php echo $urlweb?>app/css/estilos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <!-- Nav-Bar -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark bg-opacity-70 ">
        <div class="container">
          <a class="navbar-brand" href="<?php echo $urlweb ?>">
            <img src="https://inversionesczhn.com/wp-content/uploads/2021/05/logo-nuevo-CZ-final-06-e1622346480690.png" alt="Bootstrap" width="70">
            
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a href="<?php echo $urlweb ?>" class="nav-link mx-3 text-white fs-6">Inicio</a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link mx-3 text-white fs-6">Ofertas diarias</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-white fs-6" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Categorias
                </a>
                <ul class="dropdown-menu">
                  <?php
                    $strsql = "SELECT `idcategoria`, `nombre_categoria` FROM `categorias` LIMIT 6";
                    if ($stmt = $mysqli->prepare($strsql)){
                      $stmt->execute();
                      $stmt->store_result();
                      if ($stmt->num_rows > 0){
                        $stmt->bind_result($idcategoria, $nombre_categoria);
                        while ($stmt->fetch()){
                          ?>
                          <li><a class="dropdown-item" href="?modulo=marcas&idcategoria=<?php echo $idcategoria ?>"><?php echo $nombre_categoria ?></a></li>
                          <?php
                        }
                      } 
                    }
                    ?> 
                </ul>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link mx-3 text-white fs-6">Ayuda y contacto</a>
              </li>
            </ul>
            <form class="d-flex iconor" role="search">
                <div class="btn-group" role="group" aria-label="Basic example">
                    <li class="nav-item dropdown btn-lg" style="list-style-type: none;">
                      <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="bi bi-person-circle"></span>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Iniciar sesión</a></li>
                        <li><a class="dropdown-item" href="#">Crear cuenta</a></li> 
                        <li><a class="dropdown-item" href="?modulo=admin_producto">Administrador de Productos</a></li>
                        <li><a class="dropdown-item" href="?modulo=admin_categoria">Administración de Categorías</a></li>
                      </ul>
                    </li>
                    <a href="<?php $urlweb ?>?modulo=carrito" class="btn btn-dark btn-lg"><span class="bi bi-cart-fill"></span></a>
                  </div>
            </form>
          </div>
        </div>
      </nav>
    <!-- Second Nav-Bar -->
    

    <!-- Modulos -->
    <div class="container">
        <?php $funciones->openModule($modulo);?>
    </div>


    <!-- Footer -->
    <div class="card-footer bg-primary">
      <div class="container text-center">
        <div class="row row-cols-auto">
          <div class="col-6">
            <p class="text-white">
              © 2022 Desarollo de Aplicaciones en Internet
            </p>
          </div>
          <div class="col-6">
            <p class="text-white">
              usap.edu
            </p>
          </div>
        </div>
      </div>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


    

</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>