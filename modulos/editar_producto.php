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
        <div class="container">
            <form class="col s12" method="POST">
                <div class="row">
                    <div class="col l4 m4 s6">
                        <input name="nombre_producto" type="text" class="validate">
                        <?php echo $nombre_producto ?>
                        <label>Nombre del Producto</label>
                    </div>
                    <div class="col l2 m2 s6">
                        <input name="idcategoria" type="text" class="validate">
                        <?php echo $categoria ?>
                        <label>ID de Categoria</label>
                    </div>
                    <div class="col l6 m6 s12">
                        <input name="descripcion" type="text" class="validate">
                        <?php echo $descripcion?>
                        <label>Descripcion del Producto</label>
                    </div>
                </div>
                <div class="row">
                <div class="col l3 m3 s6">
                        <input name="url_imagen" type="text" class="validate">
                        <?php echo $url_imagen ?>
                        <label>URL de Imagen</label>
                    </div>
                    <div class="col l2 m2 s6">
                        <input name="precio" type="text" class="validate">
                        <?php echo $precio ?>
                        <label>Precio</label>
                    </div>
                    <div class="col l2 m2 s6">
                        <input name="cantidad" type="text" class="validate">
                        <label>Cantidad</label>
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