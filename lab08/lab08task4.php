<?php
class Circle {
    private $radius;

    public function setRadius($radius) {
        $this->radius = $radius;
    }

    public function getCircumference() {
        $circumference = 2 * M_PI * $this->radius;
        return $circumference;
    }

    public function getArea() {
        $area = M_PI * pow($this->radius, 2);
        return $area;
    }
}

$circle = new Circle();
$circle->setRadius(5); 

$circumference = $circle->getCircumference();
echo "Circumference: {$circumference}\n";

$area = $circle->getArea();
echo "Area: {$area}\n";
?>
