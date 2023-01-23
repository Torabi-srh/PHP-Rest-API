<?php

require_once(__DIR__ . '/../dataAccess.php');

class BaseModel
{

  private $table_name;
  protected $db_access;

  public function __construct($table)
  {
    $this->table_name = $table;
    $this->db_access = DataAccess::getDataAccess();
  }

  function getAll()
  {
    $query = "SELECT * FROM {$this->table_name}";
    $field = array();
    return $this->db_access->getData($query, $field);
  }

  function getById($id)
  {
    $query = "SELECT * FROM {$this->table_name} WHERE id= :id";
    $field = array("id" => $id);
    return $this->db_access->getData($query, $field);
  }

  function postItem($insert)
  { 
    $fild = []; 
    foreach ($insert as $key => $value) {
      if (is_null($value))
        $value = NULL;
      $fild[":$key"] = $value;
    }
    $query = "INSERT INTO {$this->table_name} ({$this->parameterizeDataForInputs($insert)}) VALUES ({$this->parameterizeDataForInsert($insert)})";
    return $this->db_access->insertData($query, $fild);
  }

  function updateById($id, $set)
  {
    $query = "UPDATE {$this->table_name} SET {$this->parameterizeData($set)} WHERE id = :id";
    $set["id"] = $id; 
    return $this->db_access->insertData($query, $set);
  }

  function deleteById($id)
  {
    $query = "DELETE FROM {$this->table_name} WHERE id = :id";
    $field = array("id" => $id);
    return $this->db_access->insertData($query, $field);
  }
 
  function parameterizeData($data)
  {
    $str = "";
    foreach ($data as $key => $value) { 
      $str .= $key . " = :" . $key;
    }
    return $str;
  }

  function parameterizeDataForInsert($data)
  {
    $str = "";
    foreach ($data as $key => $value) {
      $str .= ":" . $key . ",";
    }
    $str = substr($str, 0, -1);
    return $str;
  }
  function parameterizeDataForInputs($data)
  {
    $str = "";
    foreach ($data as $key => $value) {
      $str .= $key . ",";
    }
    $str = substr($str, 0, -1);
    return $str;
  }

}

?>