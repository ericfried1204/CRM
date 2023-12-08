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
    function __construct($value, $name, $price, $unit, $iva) {
        $this->value = $value;
        $this->price = $price;
        $this->name = $name;
        $this->unit = $unit;
        $this->iva = $iva;
    }
    // Methods
    function set_value($value) {
      $this->value = $value;
    }
    function get_value() {
      return $this->value;
    }
    function set_price($price){
        $this->$price=$price;
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
        $this->$unit = $unit;
    }
    function get_unit(){
        return $this->unit;
    }
    function set_iva($iva){
        $this->$iva = $iva;        
    }
    function get_iva(){
        return $this->iva;
    }
   
}
$products=[];
$query = mysqli_query($conn,"select * from tblartigos");
    while($row = mysqli_fetch_array($query)){
        $product=new Product($row['artigo'], $row['descricao'], $row['pvp1'], $row['unidade'], $row['iva']);
        array_push($products, $product);
    }
    
    die($jsonData = json_encode($products));
?>

    