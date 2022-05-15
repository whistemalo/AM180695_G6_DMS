<?php

include('../db.php');
include('Producto.class.php');


$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : '';
$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : '';

$code = 200;
$data = array();
if ($method == "GET"):
    $obj_producto = new Producto();

    if (!empty($codigo)):
        $data = $obj_producto->productoID($codigo);
    else:
        $data = $obj_producto->alls($codigo);
    endif;

endif;

echo json_encode($data);
http_response_code($code);
?>