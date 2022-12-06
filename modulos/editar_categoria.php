<?php
global $mysqli;
global $urlweb;
$idcategoria = $_GET['idcategoria'];
$strsql = "SELECT idcategoria, nombre_categoria, descripcion, url_imagen FROM categorias WHERE idcategoria=?";
if($stmt = $mysqli->prepare($strsql)){
    $stmt->bind_param ("i", $idcategoria);
    $stmt->execute();
    $stmt->store_result();
    if($stmt->num_rows>0){
        $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion, $url_imagen);
        $stmt->fetch();
        ?>
        <div class="alert container col-md-6 col-md-offset-3 shadow-lg p-3 mb-5 bg-body rounded">
        <h3 class="alert text-center fw-bold fst-italic"> Editar Categoría </h3>
            <form class="" method="POST">
                <div class="row">
                    <div class="mb-3">
                        <label class="fw-bold">Nombre de la Categoría:</label>
                        <input class="form-control" name="nombre_categoria" type="text" class="validate" value="<?php echo $nombre_categoria ?>">
                    </div>
                    <div class="mb-3">
                        <label class="fw-bold">Descripcion de la Categoría:</label>
                        <textarea class="form-control" name="descripcion" type="text" class="validate"><?php echo $descripcion?></textarea>  
                    </div>
                </div>
                <div class="row">
                <div class="mb-3">
                        <label class="fw-bold">URL de Imagen:</label>
                        <input class="form-control" name="url_imagen" type="text" class="validate" value="<?php echo $url_imagen ?>">
                    </div>
                    <button class="btn btn-success" type="submit" name="edit">Actualizar Datos 
                        <i class="bi bi-cloud-upload"></i>
                    </button>
                </div>
            </form>
            <div class="alert container col-md-6 col-md-offset-3">
                <a class="btn btn-primary col-lg-9" href="?modulo=admin_categoria"><i class="bi bi-arrow-left"></i> Volver atrás</a>
            </div>
        </div>
        <?php
    }
    if (isset($_POST['edit'])){
        if (strlen($_POST['nombre_categoria']) >= 1 &&
        strlen($_POST['descripcion']) >= 1 && 
        strlen($_POST['url_imagen']) >= 1)
        {
            $nombre_categoria= trim($_POST['nombre_categoria']);
            $descripcion= trim($_POST['descripcion']);;
            $url_imagen= trim($_POST['url_imagen']);
            $strsql ="UPDATE categorias SET nombre_categoria = '$nombre_categoria', descripcion = '$descripcion', url_imagen = '$url_imagen' WHERE idcategoria = '$idcategoria'";
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
<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>