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
        <div class="alert container col-md-6 col-md-offset-3 shadow-lg p-3 mb-5 bg-body rounded">
        <h3 class="alert text-center fw-bold fst-italic"> Editar Producto </h3>
            <form class="" method="POST">
                <div class="row">
                    <div class="mb-3">
                        <label class="fw-bold">Nombre del Producto:</label>
                        <input class="form-control" name="nombre_producto" type="text" class="validate" value="<?php echo $nombre_producto ?>">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">ID de Categoria:</label>
                        <input class="form-control" name="idcategoria" type="text" class="validate" value="<?php echo $categoria ?>">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Descripcion del Producto:</label>
                        <textarea class="form-control" name="descripcion" type="text" class="validate"><?php echo $descripcion?></textarea>  
                    </div>
                </div>
                <div class="row">
                <div class="mb-3">
                        <label class="fw-bold">URL de Imagen:</label>
                        <input class="form-control" name="url_imagen" type="text" class="validate" value="<?php echo $url_imagen ?>">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Precio:</label>
                        <input class="form-control" name="precio" type="text" class="validate" value="<?php echo $precio ?>">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Cantidad:</label>
                        <input class="form-control" name="cantidad" type="text" class="validate" value="<?php echo $cantidad ?>">
                    </div>
                    <button class="btn btn-success" type="submit" name="edit">Actualizar Datos 
                        <i class="bi bi-cloud-upload"></i>
                    </button>
                </div>
            </form>
            <div class="alert container col-md-6 col-md-offset-3">
                <a class="btn btn-primary col-lg-9" href="?modulo=admin_producto"><i class="bi bi-arrow-left"></i> Volver atrás</a>
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