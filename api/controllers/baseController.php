<?php
$header = "Content-Type: application/json";
header($header);

class BaseController
{

  public $model;

  public function __construct($model)
  {
    $this->model = $model;
  }

  function parseJson($data)
  {
    return json_encode($data, JSON_UNESCAPED_UNICODE);
  }
  function getRequestByID($id)
  {
    if (!empty($id)) {
      try {
        echo $this->parseJson($this->model->getById($_GET['id']));
      } catch (Exception $e) {
        echo $this->parseJson(array("error" => true, "message" => $e->getMessage()));
      }
    } 
  }
  function getRequestAll()
  {
    try {
      echo $this->parseJson($this->model->getAll());
    } catch (Exception $e) {
      echo $this->parseJson(array("error" => true, "message" => $e->getMessage()));
    }
  }
  function getRequest()
  {

    if (isset($_GET['action'])) {
      switch ($_GET['action']) {
        case "getall":
          try {
            echo $this->parseJson($this->model->getAll());
          } catch (Exception $e) {
            echo $this->parseJson(array("error" => true, "message" => $e->getMessage()));
          }
          break;
        case "getbyid":
          try {
            echo $this->parseJson($this->model->getById($_GET['id']));
          } catch (Exception $e) {
            echo $this->parseJson(array("error" => true, "message" => $e->getMessage()));
          }
          break;
        default:
          echo $this->parseJson(array("error" => true, "message" => "API route is not defined"));
          break;
      }
    }

  }
  function postRequest($input)
  { 
    try {
      echo $this->parseJson($this->model->postItem($input));
    } catch (Exception $e) {
      echo $this->parseJson(array("error" => true, "message" => $e->getMessage()));
    }

  }

  function putRequest($input)
  { 
    $queryValues = array();
    foreach ($input as $key => $value) {
      if ($key == "id")
        continue; 
        $queryValues[$key] = $value;
    } 
    if (isset($input['id'])) {
      try {
        echo $this->parseJson($this->model->updateById($input['id'], $queryValues));
      } catch (Exception $e) {
        echo $this->parseJson(array("error" => true, "message" => $e->getMessage()));
      }
    } else {
      echo $this->parseJson(array("error" => true, "message" => "Item ID is not defined"));
    }

  }

  function deleteRequest($input)
  { 
    if (!empty($input['id'])) {
      try {
        foreach ($input['id'] as $key => $value) {
          $resp = $this->model->deleteById($value);
        }
        echo $this->parseJson($resp);
      } catch (Exception $e) {
        echo $this->parseJson(array("error" => true, "message" => $e->getMessage()));
      }
    } else {
      echo $this->parseJson(array("error" => true, "message" => "Item ID is not defined"));
    }

  }

}

?>