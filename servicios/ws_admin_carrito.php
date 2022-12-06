<?php
require('../config.php');

$accion = isset($_GET['accion']) ? $_GET['accion'] : 'default';

try {
  switch ($accion) {
    case 'add':
      $json = file_get_contents('php://input');
      $data = json_decode($json);

      if (isset($data)) {
        $strsql = 'INSERT INTO carrito (idproducto) VALUES (?)';
        $stmt = $mysqli->prepare($strsql);
        $stmt->bind_param('i', $data->idproducto);
        $stmt->execute();
        if ($stmt->errno == 0) {
          $text = 'Producto agregado exitosamente';
        } else {
          $text = 'Error al agregar el producto' . $stmt->error;
        }
      } else {
        $text = 'Error al agregar el producto' . $mysqli->error;
      }
      break;
    case 'delete':
      $json = file_get_contents('php://input');
      $data = json_decode($json);

      if (isset($data)) {
        $strsql = 'DELETE FROM carrito WHERE idcarrito = ?';
        $stmt = $mysqli->prepare($strsql);
        $stmt->bind_param('i', $data->idcarrito);
        $stmt->execute();
        if ($stmt->errno == 0) {
          $text = 'Producto eliminado exitosamente';
        } else {
          $text = 'Error al eliminar el producto' . $stmt->error;
        }
      } else {
        $text = 'Error al eliminar el producto' . $mysqli->error;
      }
      break;
    case 'default':
      break;
  }

  $jsonreturn = array(
    "text" => $text
  );
  echo json_encode($jsonreturn);
} catch (Exception $e) {
  $jsonreturn = array(
    "text" => 'Error al agregar el producto: ' . $e->getMessage()
  );
  echo json_encode($jsonreturn);
}
?>