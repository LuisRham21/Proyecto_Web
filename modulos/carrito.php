
<div class="alert container">
    <table class="table">
    <thead>
        <tr class="table-dark fst-italic ">
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
<!-- BOOTSTRAP -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
