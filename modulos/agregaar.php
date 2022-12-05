<?php
global $mysqli;
global $urlweb;
?>

<div class="alert container col-md-6 col-md-offset-3 shadow-lg p-3 mb-5 bg-body rounded ">
    <form class="" method="POST">
        <div class="container row ">
            <div class="mb-3">
                <label>Nombre del Producto</label>
                <input class="form-control" name="nombre_producto" type="text" class="validate">
            </div>
            <div class="mb-3">
                <label>Id Categoria</label>
                <input class="form-control" name="idcategoria" type="text" class="validate">
            </div>
            <div class="mb-3">
                <label>Descripcion del Producto</label>
                <textarea  class="form-control" name="descripcion" type="text" class="validate"></textarea>
            </div>
            <div class="mb-3">
                <label>URL de Imagen</label>
                <input class="form-control" name="url_imagen" type="text" class="validate">
            </div>
            <div class="mb-3">
                <label>Precio</label>
                <input class="form-control" name="precio" type="text" class="validate">
            </div>
            <div class="mb-3">
                <label>Cantidad</label>
                <input class="form-control" name="cantidad" type="text" class="validate">
            </div>
            <button class="btn btn-success " type="submit" name="agregar">Agregar Producto
                <i class="bi bi-send-fill"></i>
            </button>
        </div>
    </form>
    <div class="alert container col-md-6 col-md-offset-3">
        <a class="btn btn-primary col-lg-9" href="?modulo=admin_producto"><i class="bi bi-arrow-left"></i> Volver atras</a>
    </div>
</div>

<?php
    if (isset($_POST['agregar'])){
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
            $strsql ="INSERT INTO productos(nombre_producto, idcategoria, descripcion, precio, cantidad, url_imagen) VALUES ('$nombre_producto','$idcategoria','$descripcion','$precio','$cantidad','$url_imagen')";
            $resultado=mysqli_query($mysqli,$strsql);
            if ($resultado) {
            ?>
                <h3>Producto agregado de Manera Exitosa</h3>
                <?php
                mysqli_close($mysqli);
            } else {
                ?>
                <h2>Error al agregar el producto.</h2>
                <?php
            }
        }else {
            ?>
            <h3>Debe de llenar todos los campos</h3>
            <?php
        }
    }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>