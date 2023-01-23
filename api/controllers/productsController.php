<?php
header('Access-Control-Allow-Origin: *');
include_once __DIR__ . '/../models/productsModel.php';
include_once __DIR__ . '/baseController.php';

$controller = new BaseController(new ProductsModel());

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
  case 'GET':
    if (!empty($_GET['action']) && $_GET['action'] == "getbysku") { 
      try {
        echo $controller->parseJson($controller->model->getBySku($_GET['sku']));
      } catch (Exception $e) {
        echo $controller->parseJson(array("error" => true, "message" => $e->getMessage())); 
      }
      break;
    }
    $controller->getRequest();
    break;
  case 'PUT':
    $value = json_decode(file_get_contents('php://input'), true);
    $controller->putRequest($value);
    break;
  case 'POST':
    $value = json_decode(file_get_contents('php://input'), true);
    $controller->postRequest($value);
    break;
  case 'DELETE':
    $value = json_decode(file_get_contents('php://input'), true);
    $controller->deleteRequest($value);
    break;
  default:
    echo json_encode(array("error" => true, "message" => "Wrong HTTP method"), JSON_UNESCAPED_UNICODE);
    break;
}

?>