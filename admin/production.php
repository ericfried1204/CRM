<?php include('../includes/session.php') ?>
<?php include('../includes/config.php') ?>
<?php

class Product {
    // Properties
    public $value;
    public $price;
    public $name;
    public $unit;
    public $iva;
    public $stock;
    function __construct($value, $name, $price, $unit, $iva, $stock) {
        $this->value = $value;
        $this->price = $price;
        $this->name = $name;
        $this->unit = $unit;
        $this->iva = $iva;
        $this->stock = $stock;
    }
    // Methods
    function set_stock($stock){
        $this->stock = $stock;
    }
    function get_stock(){
        return $this->stock;
    }
    function set_value($value) {
      $this->value = $value;
    }
    function get_value() {
      return $this->value;
    }
    function set_price($price){
        $this->price=$price;
    }
    function get_price() {
        return $this->price;
    }
    function set_name($name) {
        $this->name = $name;
    }
    function get_name() {
        return $this->name;
    }
    function set_unit($unit){
        $this->unit = $unit;
    }
    function get_unit(){
        return $this->unit;
    }
    function set_iva($iva){
        $this->iva = $iva;        
    }
    function get_iva(){
        return $this->iva;
    }
   
}
$products=[];
$jsonData="";
$query = mysqli_query($conn,"select * from tblartigos WHERE pvp1 != '0,00';");
    while($row = mysqli_fetch_array($query)){

        $string = $row['descricao'];

        $encodings = array('UTF-8', 'ISO-8859-1', 'UTF-16', 'Windows-1252');

        foreach ($encodings as $encoding) {
            $utf8String = mb_convert_encoding($string, 'UTF-8', $encoding);
            $isValidUTF8 = mb_check_encoding($utf8String, 'UTF-8');

            if ($isValidUTF8) {                
                $string=$utf8String;
                break;
            }
        }
        $product=new Product($row['artigo'], $string, $row['pvp1'], $row['unidade'], $row['iva'], $row['stock']);        
        array_push($products, $product);
    }    
    
    $jsonData = json_encode($products);
    // var_dump($jsonData);   
    
    die($jsonData);
?>
