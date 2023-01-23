<?php

class ProductFactory
{
    public static function createProduct(string $productType, $data)
    {
        switch ($productType) {
            case 'dvd':
                $obj = new DVD();
                $obj->set($data);
                return $obj;
                break;
            case 'book':
                $obj = new Book();
                $obj->set($data);
                return $obj;
                break;
            case 'furniture':
                $obj = new Furniture();
                $obj->set($data);
                return $obj;
                break;
            default:
                echo json_encode(array("error" => true, "message" => 'Invalid product type.'), JSON_UNESCAPED_UNICODE);
                die();
        }
    }
}
abstract class Product
{
    public $sku;
    public $name;
    public $price;
    public $productType;
    abstract public function set($data);
}
class DVD extends Product
{
    public $size;
    public function set($data)
    {
        if ($data['size'] === null || trim($data['size']) === '') {
            echo json_encode(array("error" => true, "message" => 'Please, provide the data of size'), JSON_UNESCAPED_UNICODE);
            die();
        }
        if (!is_numeric($data['size'])) {
            echo json_encode(array("error" => true, "message" => 'Invalid data type'), JSON_UNESCAPED_UNICODE);
            die();
        }
        $this->sku = $data['sku'];
        $this->name = $data['name'];
        $this->price = $data['price'];
        $this->productType = $data['productType'];
        $this->size = $data['size'];
    }
}
class Book extends Product
{
    public $weight;
    public function set($data)
    {
        if ($data['weight'] === null || trim($data['weight']) === '') {
            echo json_encode(array("error" => true, "message" => 'Please, provide the data of weight'), JSON_UNESCAPED_UNICODE);
            die();
        }
        if (!is_numeric($data['weight'])) {
            echo json_encode(array("error" => true, "message" => 'Please, provide the data of weight'), JSON_UNESCAPED_UNICODE);
            die();
        }
        $this->sku = $data['sku'];
        $this->name = $data['name'];
        $this->price = $data['price'];
        $this->productType = $data['productType'];
        $this->weight = $data['weight'];
    }
}
class Furniture extends Product
{
    public $height;
    public $length;
    public $width;
    public function set($data)
    {
        if ($data['height'] === null || trim($data['height']) === '') {
            echo json_encode(array("error" => true, "message" => 'Invalid `height` Format'), JSON_UNESCAPED_UNICODE);
            die();
        }
        if (!is_numeric($data['height'])) {
            echo json_encode(array("error" => true, "message" => 'Invalid `height` Format'), JSON_UNESCAPED_UNICODE);
            die();
        }
        if ($data['length'] === null || trim($data['length']) === '') {
            echo json_encode(array("error" => true, "message" => 'Invalid `length` Format'), JSON_UNESCAPED_UNICODE);
            die();
        }
        if (!is_numeric($data['length'])) {
            echo json_encode(array("error" => true, "message" => 'Invalid `length` Format'), JSON_UNESCAPED_UNICODE);
            die();
        }
        if ($data['width'] === null || trim($data['width']) === '') {
            echo json_encode(array("error" => true, "message" => 'Invalid `width` Format'), JSON_UNESCAPED_UNICODE);
            die();
        }
        if (!is_numeric($data['width'])) {
            echo json_encode(array("error" => true, "message" => 'Invalid `width` Format'), JSON_UNESCAPED_UNICODE);
            die();
        }
        $this->sku = $data['sku'];
        $this->name = $data['name'];
        $this->price = $data['price'];
        $this->productType = $data['productType'];
        $this->height = $data['height'];
        $this->length = $data['length'];
        $this->width = $data['width'];
    }
}