<?php
require "../config.php";
$accion = isset($_GET['accion']) ? $_GET['accion']:"default";

    switch($accion)
    {
        case "eliminar":
            $json = file_get_contents('php://input');
            $data = json_decode($json);

            if(isset($data)){
                $strsql = "DELETE FROM categorias WHERE idcategoria = ?";
                $stmt = $mysqli->prepare($strsql);
                $stmt->bind_param("i", $data->idcategoria);
                $stmt->execute();
                if($stmt->errno ==0){
                    $text = "locoo siuuuu";
                }else{
                    $text = "No se pudo ejecutar la consulta washo :(";
                }
            }else{
                $text = "No se recibieron los parametros";
            }
            break;

        case "edit":
            $json = file_get_contents('php://input');
            $data = json_decode($json);

            if (
                isset($_POST["id"]) && !empty($_POST["id"]) &&
                isset($_POST["nombre"]) && !empty($_POST["nombre"]) &&
                isset($_POST["precio"]) && !empty($_POST["precio"])
            ) {
            
                $id = $_POST["id"];
                $nombre = $_POST["nombre"];
                $precio = $_POST["precio"];
            
                if (isset($_POST["imagen"]) && !empty($_POST["imagen"])) {
                    $sql = "UPDATE producto SET nombre=?, precio=?, imagen=? WHERE id=?";
                    $imagen = $_POST["imagen"];
                } else {
                    $sql = "UPDATE producto SET nombre=?, precio=? WHERE id=?";
                }
            
                if ($statement = mysqli_prepare($conexion, $sql)) {
                    if (isset($_POST["imagen"]) && !empty($_POST["imagen"])) {
                        mysqli_stmt_bind_param($statement, "sdsi", $nombre, $precio, $imagen, $id);
                    } else {
                        mysqli_stmt_bind_param($statement, "sdi", $nombre, $precio, $id);
                    }
            
                    if (mysqli_stmt_execute($statement)) {
                        header("location: index.php");
                        exit();
                    } else {
                        echo "Error al actualizar";
                    }
                    mysqli_stmt_close($statement);
                } else {
                    echo "Error al preparar la consulta.";
                }
            
                mysqli_close($conexion);
            } else {
            ?>
            
                <!-- Modificar -->
                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3 class="modal-title" id="exampleModalLabel">Modificar producto</h3>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body ">
                                <form action="edit.php" method="post">
                                    <div style="visibility: visible">
                                        <label>Id</label>
                                        <input type="text" name="id" id="id" class="form-control" readonly><br />
                                    </div>
            
                                    <div>
                                        <label>Nombre</label>
                                        <input type="text" id="nombre" name="nombre" class="form-control" require>
            
                                    </div>
                                    <div>
                                        <label>Precio</label>
                                        <input type="text" id="precio" name="precio" class="form-control" require>
            
                                    </div>
            
                                    <div>
                                        <label>Imagen</label><br>
                                        <img id="img" name="img" alt="No image" width="70" heigth="70"><br>
                                        <input type="file" type="file" id="imagen" name="imagen" class="form-control" onclick="updateimage()">
                                    </div>
                                    <br><br>
            
                                    <input type="submit" class="btn btn-primary" value="Modificar">
                                    <a href="index.php" class="btn btn-default">Cancelar</a>
                                </form>
            
                            </div>
            
                        </div>
                    </div>
                </div>
            
            <?php  }
        break;

    }

    $jsonreturn = array(
        "text" => $text
    );

    echo json_encode($jsonreturn)
?>