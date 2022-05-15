<?php

include('../../db.php');
include('../Producto.class.php');

$codigo = isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : '';
$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : '';

$data = array();
$code = 200;
$ok = true;
$resultado = 1;

$mensaje = "";

if ($method == "DELETE"):

    if (!empty($codigo)):
        $mensaje = $codigo . " - " . $method . " HOLA";
        $obj_producto = new Producto();
        $result = $obj_producto->delete($codigo);
        if ($result):
            $mensaje = "Producto eliminado exitosamente";
        else:
            $code = 400;
            $mensaje = "No se ha podido eliminar el producto";
        endif;
    endif;
else:
    $code = 400;
    $resultado = 0;
endif;


$data["ok"] = $ok;
$data["resultado"] = $resultado;
$data["mensaje"] = $mensaje;

http_response_code($code);
echo json_encode($data);
?>