<?php

require_once(__DIR__ . '/dbConnect.php');

class DataAccess
{

  protected static $db;
  public static $instance;

  private function __construct()
  {
    self::$db = DbConnect::getConnection();
    self::$instance = $this;
  }

  public static function getDataAccess()
  {
    if (!self::$instance) {
      new DataAccess();
    }

    return self::$instance;
  }

  public function getData($query, $fields)
  {
    try {
      $statement = self::$db->prepare($query);
      $statement->execute($fields);

      $result_array = array();
      while ($result = $statement->fetchObject()) {
        array_push($result_array, $result);
      }

      if (sizeof($result_array) == 0) {
        echo json_encode(array("error" => true, "message" => "Data not found"), JSON_UNESCAPED_UNICODE);
        die();
      }

      return $result_array;

    } catch (PDOException $e) {
      echo json_encode(array("error" => true, "message" => "Database query error"), JSON_UNESCAPED_UNICODE);
      die();
    } catch (Exception $e) {
      echo json_encode(array("error" => true, "message" => $e->getMessage()), JSON_UNESCAPED_UNICODE);
      die();
    }

  }

  public function insertData($query, $fields)
  {
    try {
      $statement = self::$db->prepare($query);
      $statement->execute($fields);

      return array("error" => false, "message" => "successfull");
    } catch (PDOException $e) {
      if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
        echo json_encode(array("error" => true, "message" => "Duplicate SKU"), JSON_UNESCAPED_UNICODE);
      } else {
        echo json_encode(array("error" => true, "message" => "Database query error", "details" => $e->getMessage()), JSON_UNESCAPED_UNICODE);
      }
      die();
    }
  }
}

?>