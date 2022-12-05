<?php
global $mysqli;

$idproducto = $_GET['idproducto'];
    $strsql = "SELECT `idproducto`, `nombre_producto`, `descripcion`, `precio`, `cantidad`, `url_imagen` FROM productos WHERE idproducto=?";
    if($stmt = $mysqli->prepare($strsql)){
        $stmt->bind_param("i", $idproducto);
        $stmt->execute();
        $stmt->store_result();
        if($stmt->num_rows > 0){
            $stmt->bind_result($idproducto, $nombre_producto, $descripcion, $precio, $cantidad, $url_imagen);
            $stmt->fetch();
        }else{
            echo "No hay nada que mostrar";
        }
    }else{
        echo "No se pudo preparar la consulta";
    }
?>

<div class="container">
    <div class="alert row">
        <div class="col-5">
            <img src="<?php echo $url_imagen?>" class="img-fluid" alt="">
        </div>
        <div class="col-7">
            <h3><?php echo $nombre_producto ?></h3>
            <p><b>Descripcion del producto: </b><span><?php echo $descripcion ?></span></p>
            <p><b>Cantidad en existencia: </b><span><?php echo $cantidad ?></span></p>

            <h5>Precio: L. <b><?php echo number_format($precio, 2) ?></b></h5>
            <a href="#" class="btn btn-danger btn-lg active">Agregar al carrito <span class="bi bi-cart-fill"></span></a>
        </div>
    </div>
</div>
<?php ?>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


    