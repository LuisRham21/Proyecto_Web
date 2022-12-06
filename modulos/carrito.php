
<div class="alert container">
    <table class="table">
    <thead>
        <tr class="table-dark fst-italic ">
            <th class="text-center">IdProducto</th>
            <th class="text-center">Producto</th>
            <th class="text-center">Imagen</th>
            <th class="text-center">Precio</th>
        </tr>
    </thead>
    <tbody>
    <?php
        global $mysqli;
        $query = "SELECT carrito.idcarrito, carrito.idproducto, productos.nombre_producto, productos.url_imagen, productos.precio FROM `carrito` INNER JOIN productos ON productos.idproducto=carrito.idproducto";
        if ($stmt = $mysqli->prepare($query)) {
            $stmt->execute();
            $stmt->store_result();
            if ($stmt->num_rows > 0) {
            $stmt->bind_result($idcarrito, $idproducto, $nombre_producto, $url_imagen, $precio);
            $total;
            }
            while ($stmt->fetch()) {
                ?>
                <tr id="<?php echo $idcarrito ?>">
                    <td><?php echo $idproducto ?></td>
                    <td><?php echo $nombre_producto ?></td>
                    <td><img src="<?php echo $url_imagen ?>" width="150px" alt=""></td>
                    <td class="text-center"><?php echo $precio ?></td>
                </tr>
                <?php
                $total += $precio;
            }
        }
        ?>
    </tbody>
    </table>
</div>