<?php

include_once __DIR__ . '/../models/productsModel.php';
include_once __DIR__ . '/../controllers/baseController.php';

$controller = new BaseController(new ProductsModel());

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'DELETE':
        $controller->deleteRequest();
        break;
    default:
        echo json_encode(array("error" => true, "message" => "Wrong HTTP method"), JSON_UNESCAPED_UNICODE);
        break;
}

?>