<?php
header('Access-Control-Allow-Origin: *');
include_once __DIR__ . '/../models/productsModel.php';
include_once __DIR__ . '/../controllers/baseController.php';

$controller = new BaseController(new ProductsModel());

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'POST':
        $value = json_decode(file_get_contents('php://input'), true);
        $product = ProductFactory::createProduct($value['productType'], $value);
        $controller->postRequest($product);
        break;
    case 'PUT':
        $value = json_decode(file_get_contents('php://input'), true);
        $controller->putRequest($value);
        break;
    default:
        echo json_encode(array("error" => true, "message" => "Wrong HTTP method"), JSON_UNESCAPED_UNICODE);
        break;
}

?>