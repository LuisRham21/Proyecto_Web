<?php  
global $mysqli;
global $urlweb;
?>
<div class="alert container shadow-lg p-3 mb-5 bg-body rounded ">
<h3 class="text-center fw-bold fst-italic"><i class="bi bi-box2-fill"></i> Administrador de producto <i class="bi bi-box2-fill"></i></h3>
<div class="row justify-content-end ">
        <div class="col-auto">
            <a class="btn btn-success" href="<?php $urlweb ?>?modulo=agregar_producto" >Nuevo registro <i class="bi bi-plus-lg" ></i></a>
        </div>
    </div>
<table class="table table-sm table-striped table-hover mt-4 table-bordered">
    <thead>
        <tr class="table-dark fst-italic ">
            <th class="text-center">Producto</th>
            <th >Categoria</th>
            <th class="text-center">Descripción</th>
            <th class="text-center">Imagen</th>
            <th class="text-center">Precio</th>
            <th class="text-center">Cantidad</th>
            <th class="text-center">Editar</th>
            <th class="text-center">Eliminar</th>
        </tr>
    </thead>
    <tbody >
        <?php
            $strsql = "SELECT productos.idproducto, productos.nombre_producto, categorias.nombre_categoria, productos.descripcion, productos.url_imagen, productos.precio, productos.cantidad FROM `productos` INNER JOIN categorias ON categorias.idcategoria=productos.idcategoria";
             if($stmt = $mysqli->prepare($strsql)){
                $stmt->execute();
                $stmt->store_result();
                if ($stmt->num_rows >0 ){
                    $stmt->bind_result($idproducto, $nombre_producto, $categoria, $descripcion, $url_imagen, $precio, $cantidad);
                    while ($stmt->fetch()){
                        ?>
                            <tr id="<?php echo $idproducto ?>">
                                <td><?php echo $nombre_producto ?></td>
                                <td ><?php echo $categoria ?></td>
                                <td width="300px"><?php echo $descripcion ?></td>
                                <td><img src="<?php echo $url_imagen ?>" width="150px" alt=""></td>
                                <td class="text-center">L. <?php echo number_format($precio,2) ?></td>
                                <td class="text-center"><?php echo $cantidad ?></td>
                                <td><a href="<?php $urlweb ?>?modulo=editar_producto&idproducto=<?php echo $idproducto ?>" class="btn btn-warning text-dark fw-bold ">Editar <i class="bi bi-pencil-square text-dark"></i></a></td>
                                <td><a href="javascript:eliminar(<?php echo $idproducto ?>)" class="btn btn-danger text-dark fw-bold">Eliminar<i class="bi bi-trash3-fill text-dark"></i></a></td>
                            </tr>
                        <?php
                    }
                } else {
                    echo "No hay nada capo commit? ";
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
    function eliminar(idproducto) 
    {
        var url = '<?php echo $urlweb ?>servicios/ws_admin_productos.php?accion=eliminar';

        fetch(url, {
        method: 'POST', 
        body: JSON.stringify({
                "idproducto": idproducto
            })
        })
        .then((response) => response.json())
        .then((data) => {
        console.log(data)
        const row = document.getElementById(idproducto);
        row.remove();
        })
        .catch((error) => {
        console.error(error);
        })
    }
</script>