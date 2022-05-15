<?php

include('../../db.php');
include('../Producto.class.php');


$data = file_get_contents('php://input');
$json_data = json_decode($data, true);

$codigo = isset($json_data['codigo']) ? $json_data['codigo'] : '';
$descripcion = isset($json_data['descripcion']) ? $json_data['descripcion'] : '';
$precio = isset($json_data['precio']) ? $json_data['precio'] : '';
$method = isset($_SERVER['REQUEST_METHOD']) ? $_SERVER['REQUEST_METHOD'] : '';

$data = array();
$code = 200;
$ok = true;
$resultado = 1;
$mensaje = "";

if ($method == "POST"):
    if (!empty($codigo) && !empty($descripcion) && !empty($precio)):
        $obj_producto = new Producto();
        $result = $obj_producto->add($codigo, $descripcion, $precio);
        if ($result):
            $mensaje = "Producto registrado exitosamente";
        else:
            $code = 400;
            $mensaje = "No se ha podido registrar el producto";
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