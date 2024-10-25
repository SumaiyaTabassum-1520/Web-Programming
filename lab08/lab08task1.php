<?php
class Rectangle {
    private $width, $height;
    
    public function setWidth($w) {
        $this->width = $w;
    }
    
    public function setHeight($h) {
        $this->height = $h;
    }
    
    public function getWidth() {
        return $this->width;
    }
    
    public function getHeight() {
        return $this->height;
    }
    
    public function showArea() {
        $area = $this->width * $this->height;
        echo "Area: $area\n";
    }
}

$rect1 = new Rectangle();
$rect2 = new Rectangle();

$rect1->setWidth(5);
$rect1->setHeight(10);

$rect2->setWidth(8);
$rect2->setHeight(12);

echo "Using setWidth() and setHeight() methods:\n";
$rect1->showArea();
$rect2->showArea();
class RectangleConstructor {
    private $width, $height;
    
    public function __construct($w, $h) {
        $this->width = $w;
        $this->height = $h;
    }
    
    public function showArea() {
        $area = $this->width * $this->height;
        echo "Rectangle Area (Constructor): $area\n";
    }
}
$rect3 = new RectangleConstructor(7, 15);
$rect4 = new RectangleConstructor(6, 9);

echo "\nUsing constructor to initialize width and height:\n";
$rect3->showArea();
$rect4->showArea();
?>
