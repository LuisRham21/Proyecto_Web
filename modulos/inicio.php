<?php 
global $mysqli
?>
<!-- Carrusel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="app/img/pag1.webp" class="d-block w-100" class="img-fluid" alt="...">
      </div>
      <div class="carousel-item">
        <img src="app/img/pag2.jpg" class="d-block w-100" class="img-fluid" alt="...">
      </div>
      <div class="carousel-item">
        <img src="app/img/pag3.jpg" class="img-fluid" class="d-block w-100" alt="...">
      </div>
          <div class="carousel-item">
        <img src="https://cdn.phonehouse.es/res_static/cmsmaker/758E945E36194D38DC387B529F0BD36C.jpg?&auto=format" class="img-fluid" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
</div>
<!-- Lo mas Buscado -->
<div class="container shadow p-3 mb-5 rounded bg-success p-2 text-dark bg-opacity-10">
  <div class="alert container text-center">
    <h2 class="alert text-left">Los m??s buscados en Tienda en L??nea</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4">
    <?php
    $strsql = "SELECT `idproducto`, `nombre_producto`, `idcategoria`, `descripcion`, `precio`, `url_imagen` FROM `productos` LIMIT 4";
    if ($stmt = $mysqli->prepare($strsql)){
    $stmt->execute();
    $stmt->store_result();
      if ($stmt->num_rows > 0){
      $stmt->bind_result($idproducto, $nombre_producto, $idcategoria, $descripcion, $precio, $url_imagen);
        while ($stmt->fetch()){
          ?>
          <a href="?modulo=detalle_produto&idproducto=<?php echo $idproducto ?>">
          <div class="col text-dark fw-semibold shadow-sm p-3 mb-5 bg-body rounded">
            <img src="<?php echo $url_imagen ?>" class="img-fluid" alt="...">
            <p><?php echo $nombre_producto ?></p>
            <p><?php echo "L ".number_format($precio, 2) ?></p>
          </div>
          </a>
          <?php
        }
      } 
    }
    ?>
    </div>
  </div>
</div>
<!-- Mejores marcas -->
<div class="container shadow p-3 mb-5 rounded bg-success p-2 text-dark bg-opacity-10">
  <div class="alert container text-center">
    <h2 class="alert text-left"> Oportunidades Imperdibles </h2>
    <div class="row">
      <div class="col">
          <?php
          $strsql = "SELECT `idproducto`, `nombre_producto`, `precio`, `url_imagen` FROM `productos` WHERE `idproducto`=2";
          if ($stmt = $mysqli->prepare($strsql)){
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0){
              $stmt->bind_result($idproducto, $nombre_producto, $precio, $url_img);
              while ($stmt->fetch()){
                ?>
                <a href="?modulo=detalle_produto&idproducto=<?php echo $idproducto ?>">
                  <div class="shadow-sm p-3 mb-5 bg-body rounded">
                    <img src="<?php echo $url_img ?>" class="img-fluid" alt="...">
                    <p class="text-dark fw-semibold"><?php echo $nombre_producto ?></p>
                    <p class="text-dark fw-semibold"><?php echo "L ".number_format($precio, 2) ?></p>
                  </div>
                </a>
                <?php
              }
            } 
          }
          ?>
        </div>
        <div class="col">
        <?php
        $strsql = "SELECT `idproducto`, `nombre_producto`, `precio`, `url_imagen` FROM `productos` WHERE `idproducto`=3";
        if ($stmt = $mysqli->prepare($strsql)){
          $stmt->execute();
          $stmt->store_result();
          if ($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $nombre_producto, $precio, $url_img);
            while ($stmt->fetch()){
              ?>
              <a href="?modulo=detalle_produto&idproducto=<?php echo $idproducto ?>">
                <div class="shadow-sm p-3 mb-5 bg-body rounded">
                  <img src="<?php echo $url_img ?>" class="img-fluid" alt="...">
                  <p class="text-dark fw-semibold"><?php echo $nombre_producto ?></p>
                  <p class="text-dark fw-semibold"><?php echo "L ".number_format($precio, 2) ?></p>
                </div>
              </a>
              <?php
            }
          } 
        }
        ?>
      </div>
        <div class="col">
        <?php
        $strsql = "SELECT `idproducto`, `nombre_producto`, `precio`, `url_imagen` FROM `productos` WHERE `idproducto`=7";
        if ($stmt = $mysqli->prepare($strsql)){
          $stmt->execute();
          $stmt->store_result();
          if ($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $nombre_producto, $precio, $url_img);
            while ($stmt->fetch()){
              ?>
              <a href="?modulo=detalle_produto&idproducto=<?php echo $idproducto ?>">
                <div class="shadow-sm p-3 mb-5 bg-body rounded">
                  <img src="<?php echo $url_img ?>" class="img-fluid" alt="...">
                  <p class="text-dark fw-semibold"><?php echo $nombre_producto ?></p>
                  <p class="text-dark fw-semibold"><?php echo "L ".number_format($precio, 2) ?></p>
                </div>
              </a>
              <?php
            }
          } 
        }
        ?>
      </div>
        <div class="col">
        <?php
        $strsql = "SELECT `idproducto`, `nombre_producto`, `precio`, `url_imagen` FROM `productos` WHERE `idproducto`=4";
        if ($stmt = $mysqli->prepare($strsql)){
          $stmt->execute();
          $stmt->store_result();
          if ($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $nombre_producto, $precio, $url_img);
            while ($stmt->fetch()){
              ?>
              <a href="?modulo=detalle_produto&idproducto=<?php echo $idproducto ?>">
                <div class="shadow-sm p-3 mb-5 bg-body rounded">
                  <img src="<?php echo $url_img ?>" class="img-fluid" alt="...">
                  <p class="text-dark fw-semibold"><?php echo $nombre_producto ?></p>
                  <p class="text-dark fw-semibold"><?php echo "L ".number_format($precio, 2) ?></p>
                </div>
              </a>
              <?php
            }
          } 
        }
        ?>
      </div>
    </div>
  </div>
  <div class="alert container text-center">
    <h2 class="alert text-center"> Productos Nuevos </h2>
    <div class="row ">
      <div class="col">
        <?php
        $strsql = "SELECT `idproducto`, `nombre_producto`, `precio`, `url_imagen` FROM `productos` WHERE `idproducto`=10";
        if ($stmt = $mysqli->prepare($strsql)){
          $stmt->execute();
          $stmt->store_result();
          if ($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $nombre_producto, $precio, $url_img);
            while ($stmt->fetch()){
              ?>
              <a href="?modulo=detalle_produto&idproducto=<?php echo $idproducto ?>">
                <div class="shadow-sm p-3 mb-5 bg-body rounded">
                  <img src="<?php echo $url_img ?>" class="img-fluid" alt="...">
                  <p class="text-dark fw-semibold"><?php echo $nombre_producto ?></p>
                  <p class="text-dark fw-semibold"><?php echo "L ".number_format($precio, 2) ?></p>
                </div>
              </a>
              <?php
            }
          } 
        }
        ?>
      </div>
      <div class="col">
      <?php
        $strsql = "SELECT `idproducto`, `nombre_producto`, `precio`, `url_imagen` FROM `productos` WHERE `idproducto`=20";
        if ($stmt = $mysqli->prepare($strsql)){
          $stmt->execute();
          $stmt->store_result();
          if ($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $nombre_producto, $precio, $url_img);
            while ($stmt->fetch()){
              ?>
              <a href="?modulo=detalle_produto&idproducto=<?php echo $idproducto ?>">
                <div class="shadow-sm p-3 mb-5 bg-body rounded">
                  <img src="<?php echo $url_img ?>" class="img-fluid" alt="...">
                  <p class="text-dark fw-semibold"><?php echo $nombre_producto ?></p>
                  <p class="text-dark fw-semibold"><?php echo "L ".number_format($precio, 2) ?></p>
                </div>
              </a>
              <?php
            }
          } 
        }
        ?>
      </div>
      <div class="col">
      <?php
        $strsql = "SELECT `idproducto`, `nombre_producto`, `precio`, `url_imagen` FROM `productos` WHERE `idproducto`=21";
        if ($stmt = $mysqli->prepare($strsql)){
          $stmt->execute();
          $stmt->store_result();
          if ($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $nombre_producto, $precio, $url_img);
            while ($stmt->fetch()){
              ?>
              <a href="?modulo=detalle_produto&idproducto=<?php echo $idproducto ?>">
                <div class="shadow-sm p-3 mb-5 bg-body rounded">
                  <img src="<?php echo $url_img ?>" class="img-fluid" alt="...">
                  <p class="text-dark fw-semibold"><?php echo $nombre_producto ?></p>
                  <p class="text-dark fw-semibold"><?php echo "L ".number_format($precio, 2) ?></p>
                </div>
              </a>
              <?php
            }
          } 
        }
        ?>
      </div>
      <div class="col">
      <?php
        $strsql = "SELECT `idproducto`, `nombre_producto`, `precio`, `url_imagen` FROM `productos` WHERE `idproducto`=22";
        if ($stmt = $mysqli->prepare($strsql)){
          $stmt->execute();
          $stmt->store_result();
          if ($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $nombre_producto, $precio, $url_img);
            while ($stmt->fetch()){
              ?>
              <a href="?modulo=detalle_produto&idproducto=<?php echo $idproducto ?>">
                <div class="shadow-sm p-3 mb-5 bg-body rounded">
                  <img src="<?php echo $url_img ?>" class="img-fluid" alt="...">
                  <p class="text-dark fw-semibold"><?php echo $nombre_producto ?></p>
                  <p class="text-dark fw-semibold"><?php echo "L ".number_format($precio, 2) ?></p>
                </div>
              </a>
              <?php
            }
          } 
        }
        ?>
      </div>
    </div>
  </div>
  <div class="container text-center">
    <h2 class="alert text-center"> Comprar por Categor??a </h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 ">
      <?php
      $strsql = "SELECT `idcategoria`, `nombre_categoria`, `url_imagen` FROM `categorias` LIMIT 4";
      if ($stmt = $mysqli->prepare($strsql)){
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows > 0){
          $stmt->bind_result($idcategoria, $nombre_categoria, $url_img);
          while ($stmt->fetch()){
            ?>
            <a href="?modulo=marcas&idcategoria=<?php echo $idcategoria ?>">
              <div class="col shadow-sm p-3 mb-5 bg-body rounded">
                <img src="<?php echo $url_img ?>" class="img-fluid" alt="...">
                <p class="text-dark fw-semibold"><?php echo $nombre_categoria ?></p>
              </div>
            </a>
            <?php
          }
        } 
      }
      ?>
    </div>
  </div>
</div>

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
