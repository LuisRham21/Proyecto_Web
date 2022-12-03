<?php  
global $mysqli;
global $urlweb;
?>
<div class="alert container">
    <h3 class="text-center">Administrador de categorias</h3>
    
    <div class="row justify-content-end">
        <div class="col-auto">
            <a href="#" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#nuevomodal">Nuevo registro <i class="bi bi-plus-circle-fill"></i></a>
        </div>
    </div>
    
    <table class="table table-sm table-striped table-hover mt-4">
        <thead>
            <tr class="table-dark">
                <th>Nombre Categoria</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $strsql = "SELECT categorias.idcategoria, categorias.nombre_categoria, categorias.descripcion, categorias.url_img FROM `categorias`";
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

<!-- Modal -->
<div class="modal fade" id="modaleditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar categoria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form acction="ws_admin_categoria.php" method= "POST">
          <div class="mb-3">
            <label for="recipient-name" class="col-form-label">Nombre de Categoria:</label>
            <input type="text" class="form-control" id="name">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Descripcion:</label>
            <textarea class="form-control" id="text"></textarea>
          </div>
          <div class="mb-3">
            <label for="recipient-img" class="col-form-label">URL de la Imagen:</label>
            <input type="url" class="form-control" id="recipient-img">
            <input class="alert form-control" type="file" id="img">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-warning">Guardar cambios</button>
      </div>
    </div>
  </div>
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

<script>
    function editar(idcategoria) 
    {
        var url = '<?php echo $urlweb ?>servicios/ws_admin_categoria.php?accion=editar';

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
        row.add();
        })
        .catch((error) => {
        console.error(error);
        })
    }
</script>


<script>
    $('.modaleditar').on('click', function () 
    {
        $tr=$(this).closest('tr');
        var datos = $tr.children("td").map(function() {
            return $(this).text();
        });
        $('#name').val(datos[1]);
        $('#text').val(datos[2]);
        $('#img').val(datos[3]);

    })
</script>



