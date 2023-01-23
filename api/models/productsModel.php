<?php

include_once __DIR__ . '/../entities/product.php';
include_once __DIR__ . '/baseModel.php';

class ProductsModel extends BaseModel
{

  private $table_name = "products";

  public function __construct()
  {
    parent::__construct($this->table_name);
  }
  
  function getBySku($sku)
  {
    $query = "SELECT * FROM {$this->table_name} WHERE sku= :sku";
    $field = array("sku" => $sku);
    return $this->db_access->getData($query, $field);
  }

}
?>