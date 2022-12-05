<?php
global $mysqli;
?>
<div class="container shadow p-3 mb-5 bg-body rounded">
    <div class="alert container text-center">
              <h2 class="text-left">Los más buscados en Tienda en Línea</h2>
              <div class="row row-cols-1 row-cols-md-3 g-4 ">
<?php
$idcategoria = $_GET['idcategoria'];
    $strsql = "SELECT `idproducto`, `idcategoria`, `nombre_producto`, `descripcion`, `precio`, `cantidad`, `url_imagen` FROM productos WHERE idcategoria=?";
    if($stmt = $mysqli->prepare($strsql)){
        $stmt->bind_param("i", $idcategoria);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $idcategoria, $nombre_producto, $descripcion, $precio, $cantidad, $url_imagen);

            while ($stmt->fetch()){
                ?>
                    
                    <div class="card" style="width: 19.5rem;">
                    <img src="<?php echo $url_imagen ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $nombre_producto ?></h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                    </div>
                    
                <?php
              }
        }else{
            echo "No hay nada que mostrar";
        }
    }else{
        echo "No se pudo preparar la consulta";
    }
    ?>
</div>
</div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

