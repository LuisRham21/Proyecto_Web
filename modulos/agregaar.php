<?php
global $mysqli;
global $urlweb;
?>

<div class="container">
    <form class="col s12" method="POST">
        <div class="row">
            <div class="input-field col l4 m4 s6">
                <input name="nombre_producto" type="text" class="validate">
                <label>Nombre del Producto</label>
            </div>
            <div class="input-field col l2 m2 s6">
                <input name="idcategoria" type="text" class="validate">
                <label>ID de Producto</label>
            </div>
            <div class="input-field col l6 m6 s12">
                <input name="descripcion" type="text" class="validate">
                <label>Descripcion del Producto</label>
            </div>
            <div class="input-field col l2 m2 s6">
                <input name="url_imagen" type="text" class="validate">
                <label>URL de Imagen</label>
            </div>
            <div class="input-field col l2 m2 s6">
                <input name="precio" type="text" class="validate">
                <label>Precio</label>
            </div>
            <div class="input-field col l2 m2 s6">
                <input name="cantidad" type="text" class="validate">
                <label>Cantidad</label>
            </div>
            
            <button class="btn waves-effect waves-light" type="submit" name="agregar">Agregar Producto
                <i class="material-icons right">send</i>
            </button>
            
        </div>
    </form>
    <div>
        <a class="waves-effect waves-light btn-small" href="?modulo=admin_producto">Volver a Admin</a>
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