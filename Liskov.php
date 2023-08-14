<?php 
class hinhchunhat {
    protected $width;
    protected $height;

    public function setWidth($width) {
        $this->width = $width;
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getArea() {
        return $this->width * $this->height;
    }
}

class hinhvuong extends hinhchunhat {
    public function setWidth($width) {
        $this->width = $width;
        $this->height = $width;
    }

    public function setHeight($height) {
        $this->height = $height;
        $this->width = $height;
    }
}
class xuly(){
    function printArea(Rectangle $rectangle) {
        $rectangle->setWidth(4);
        $rectangle->setHeight(5);
        echo "Area: " . $rectangle->getArea() . "\n";
    }
    
    $rectangle = new Rectangle();
    printArea($rectangle); // Kết quả: Area: 20
    
    $square = new Square();
    printArea($square); // Kết quả: Area: 25
}

?>