<?php  
global $mysqli;
global $urlweb;
?>
<div class="alert container">
    <h3 class="text-center">Administrador de categorias</h3>
    
    <div class="row justify-content-end">
        <div class="col-auto">
            <a href="#" class="btn btn-info add-model" data-bs-toggle="modal" data-bs-target="#aggmodal">Nuevo registro <i class="bi bi-plus-circle-fill"></i></a>
        </div>
    </div>
    
    <table class="table table-sm table-striped table-hover mt-4">
        <thead>
            <tr id="userListTable" class="table-dark">
                <th>Nombre Categoria</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $strsql = "SELECT idcategoria, nombre_categoria, descripcion, url_img FROM `categorias`";
                if($stmt = $mysqli->prepare($strsql)){
                    $stmt->execute();
                    $stmt->store_result();
                    if ($stmt->num_rows >0 ){
                        $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion, $url_img);
                        while ($stmt->fetch()){
                            ?>
                                <tr id="<?php echo $idcategoria ?>">
                                    <td><?php echo $nombre_categoria ?></td>
                                    <td width="600px"><?php echo $descripcion ?></td>
                                    <td><img src="<?php echo $url_img ?>" width="140px" alt=""></td>
                                    <td><a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modaleditar" href="javascript:editar(<?php echo $idcategoria ?>)">Editar <i class="bi bi-pencil-square"></i></a></td>
                                    <td><a class="btn btn-danger editbtn" href="javascript:eliminar(<?php echo $idcategoria ?>)">Eliminar <i class="bi bi-trash-fill"></i></a></td>
                                </tr>
                            <?php
                        }
                    } else {
                        echo "No hay nada capo";
                    }
                } else {
                    echo "No se que hiciste xd";
                }
            ?>  
            
        </tbody>
    </table>
</div>

<!-- JS Eliminaar -->
<script>
    function eliminar(idcategoria) 
    {
        var url = '<?php echo $urlweb ?>servicios/ws_admin_categoria.php?accion=eliminar';

        fetch(url, {
        method: 'POST', 
        body: JSON.stringify({
                "idcategoria": idcategoria
            })
        })
        .then((response) => response.json())
        .then((data) => {
        console.log(data)
        const row = document.getElementById(idcategoria);
        row.remove();
        })
        .catch((error) => {
        console.error(error);
        })
    }
</script>

