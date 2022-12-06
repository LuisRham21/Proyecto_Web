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
<section></section>
<section>
    <div class="collection-wrapper">
        <div class="alert container">
            <div class="row data-sticky_parent">
                <div class="col-lg-12 col-sm-12 col-xs-12">
                    <div class="container-fluid p-0">
                        <div class="row">
                            <div class="col-lg-6">
                                <img src="<?php echo $url_imagen?>" class="img-fluid" alt="">
                            </div>
                            <div class="alert col-lg-6">
                                <div class="product-right pro_sticky_info">
                                    <h2><?php echo $nombre_producto ?></h2>
                                    <h4 >L. <b><?php echo number_format($precio, 2) ?></h4>
                                    <div class="col-lg-12 col-sm-12 col-xs-12">
                                        <h6>Cantidad</h6>
                                        <div class="btn-group">
                                            <button class="btn btn-dark qty-decrease" onclick="var qty_el = document.getElementById('cantidad'); var qty = qty_el.value; if( !isNaN( qty ) &amp;&amp; qty > 1 ) qty_el.value--;return false;" type="button"><i class="bi bi-arrow-left-circle"></i></button>
                                            <input id="cantidad" class="input-text qty text-center" type="text" title="cantidad" value="1" name="cantidad">
                                            <button class="btn btn-dark qty-increase" onclick="var qty_el = document.getElementById('cantidad'); var qty = qty_el.value; if( !isNaN( qty )) qty_el.value++;return false;" type="button"><i class="bi bi-arrow-right-circle"></i></button>
                                        </div>
                                        <a href="#" class="btn btn-danger">Agregar al carrito <span class="bi bi-cart-fill"></span></a>
                                    </div>
                                </div>
                                <div class="alert col-lg-10">
                                        <h5>Descripcion del producto</h5>
                                        <h6><span><?php echo $descripcion ?></span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php ?>

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


    