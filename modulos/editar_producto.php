<?php
global $mysqli;
global $urlweb;
$idproducto = $_GET['idproducto'];
$strsql = "SELECT productos.idproducto, productos.nombre_producto, categorias.idcategoria, productos.descripcion, productos.url_imagen, productos.precio, productos.cantidad FROM productos INNER JOIN categorias ON categorias.idcategoria=productos.idcategoria WHERE idproducto=?";
if($stmt = $mysqli->prepare($strsql)){
    $stmt->bind_param ("i", $idproducto);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        $stmt->bind_result($idproducto, $nombre_producto, $categoria, $descripcion, $url_imagen, $precio, $cantidad);
        $stmt->fetch();
        ?>
        <div class="alert container shadow-lg p-3 mb-5 bg-body rounded">
            <form class="" method="POST">
                <div class="row">
                    <div class="col">
                        <label>Nombre del Producto</label>
                        <input name="nombre_producto" type="text" class="validate">
                        <?php echo $nombre_producto ?>
                    </div>
                    <div class="col">
                        <input name="idcategoria" type="text" class="validate">
                        <?php echo $categoria ?>
                        <label>ID de Categoria</label>
                    </div>
                    <div class="col">
                        <label>Descripcion del Producto</label>
                        <input name="descripcion" type="text" class="validate">
                        <?php echo $descripcion?>
                    </div>
                </div>
                <div class="row">
                <div class="col">
                        <label>URL de Imagen</label>
                        <input name="url_imagen" type="text" class="validate">
                        <?php echo $url_imagen ?>
                    </div>
                    <div class="col">
                        <label>Precio</label>
                        <input name="precio" type="text" class="validate">
                        <?php echo $precio ?>
                    </div>
                    <div class="col">
                        <label>Cantidad</label>
                        <input name="cantidad" type="text" class="validate">
                        <?php echo $cantidad ?>
                    </div>
                    <button class="btn btn-primary" type="submit" name="edit">Actualizar Información de Producto
                        <i class="btn btn-primary stretched-link">send</i>
                    </button>
                </div>
            </form>
            <div>
                <a class="btn btn-primary stretched-link" href="?modulo=admin_producto">Volver a Admin</a>
            </div>
        </div>
        <?php
    }
    if (isset($_POST['edit'])){
        if (strlen($_POST['nombre_producto']) >= 1 &&
        strlen($_POST['idcategoria']) >= 1 && 
        strlen($_POST['descripcion']) >= 1 &&
        strlen($_POST['precio']) >=1 &&
        strlen($_POST['cantidad']) >= 1 && 
        strlen($_POST['url_imagen']) >= 1)
        {
            $nombre_producto= trim($_POST['nombre_producto']);
            $idcategoria= trim($_POST['idcategoria']);
            $descripcion= trim($_POST['descripcion']);
            $precio= trim($_POST['precio']);
            $cantidad= trim($_POST['cantidad']);
            $url_imagen= trim($_POST['url_imagen']);
            $strsql ="UPDATE productos SET nombre_producto = '$nombre_producto', idcategoria = '$idcategoria', descripcion = '$descripcion', precio = '$precio', cantidad = '$cantidad', url_imagen = '$url_imagen' WHERE idproducto = '$idproducto'";
            $resultado=mysqli_query($mysqli,$strsql);
            if ($resultado) {
            ?>
                <h3>Producto actualizado de Manera Exitosa</h3>
                <?php
                mysqli_close($mysqli);
            } else {
                ?>
                <h2>Error al actualizar el producto.</h2>
                <?php
            }
        }else {
            ?>
            <h3>Debe de llenar todos los campos</h3>
            <?php
        }
    }
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>