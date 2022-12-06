<?php  
global $mysqli;
global $urlweb;
?>
<div class="alert container shadow-lg p-3 mb-5 bg-body rounded ">
    <h3 class="text-center fw-bold fst-italic">Administrador de Categoría <i class="bi bi-tags-fill"></i></h3>
    
    <div class="row justify-content-end">
        <div class="col-auto">
        <a class="btn btn-success" href="<?php $urlweb ?>?modulo=agregar_categoria" >Nuevo registro <i class="bi bi-plus-lg" ></i></a>
        </div>
    </div>
    
    <table class="table table-sm table-striped table-hover mt-4 table-bordered">
        <thead>
            <tr class="table-dark fst-italic">
                <th class="text-center">Nombre Categoría</th>
                <th class="text-center">Descripción</th>
                <th class="text-center">Imagen</th>
                <th class="text-center">Editar</th>
                <th class="text-center">Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $strsql = "SELECT idcategoria, nombre_categoria, descripcion, url_imagen FROM `categorias`";
                if($stmt = $mysqli->prepare($strsql)){
                    $stmt->execute();
                    $stmt->store_result();
                    if ($stmt->num_rows >0 ){
                        $stmt->bind_result($idcategoria, $nombre_categoria, $descripcion, $url_imagen);
                        while ($stmt->fetch()){
                            ?>
                                <tr id="<?php echo $idcategoria ?>">
                                    <td ><?php echo $nombre_categoria ?></td>
                                    <td width="600px"><?php echo $descripcion ?></td>
                                    <td class="text-center"><img src="<?php echo $url_imagen ?>" width="100px" alt=""></td>
                                    <td><a href="<?php $urlweb ?>?modulo=editar_categoria&idcategoria=<?php echo $idcategoria ?>" class="btn btn-warning text-dark fw-bold ">Editar <i class="bi bi-pencil-square text-dark"></i></a></td>
                                    <td class="text-center"><a class="btn btn-danger editbtn" href="javascript:eliminar(<?php echo $idcategoria ?>)">Eliminar <i class="bi bi-trash-fill"></i></a></td>
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

<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>